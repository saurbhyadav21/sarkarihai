<form action="{{ route('job.store.json') }}" method="POST">
    @csrf

    <!-- JSON -->
    <div>
        <label>Paste Job JSON</label><br>
        <textarea name="job_json" rows="10" style="width:100%;"
            placeholder="Paste JSON here"></textarea>
    </div>

    <br>

    <!-- CATEGORY -->
    <div>
        <label><b>Select Category</b></label><br>

        <select name="category_id" id="category_id" required>
            <option value="">-- Select Category --</option>

            @foreach($categories as $cat)
                <option value="{{ $cat->name }}">
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
    </div>

    <br>

    <!-- ADD NEW CATEGORY -->
    <div>
        <label><b>Add New Category</b></label><br>

        <input type="text" id="new_category"
            placeholder="Enter Category Name">

        <button type="button" id="addCategoryBtn">
            Add Category
        </button>
    </div>
<button type="button" id="deleteCategoryBtn">
    Delete Selected Category
</button>
    <br>
<br><br>
<br><br>
<br><br>
<br>


    <button type="submit">Submit Job</button>
</form>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
$("#addCategoryBtn").click(function(){

    let category = $("#new_category").val();

    if(category == ''){
        alert("Enter category");
        return;
    }

    $.ajax({
        url: "{{ route('category.ajax.store') }}",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            name: category
        },
        success: function(response){

            $("#category_id").append(
                '<option value="'+response.name+'" selected>'
                +response.name+
                '</option>'
            );

            $("#new_category").val('');

            alert("Category Added Successfully");
        },
        error:function(){
            alert("Something went wrong");
        }
    });

});


$("#deleteCategoryBtn").click(function () {

    let category = $("#category_id").val();

    if(category == ''){
        alert("Select category first");
        return;
    }

    if(!confirm("Delete this category?")){
        return;
    }

    $.ajax({
        url: "{{ route('category.ajax.delete') }}",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            name: category
        },
        success: function(response){

            $("#category_id option:selected").remove();

            $("#category_id").val('');

            alert("Category Deleted Successfully");
        },
        error:function(){
            alert("Something went wrong");
        }
    });

});
</script>