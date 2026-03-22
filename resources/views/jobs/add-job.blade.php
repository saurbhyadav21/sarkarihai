<form action="{{ route('job.store.json') }}" method="POST">
    @csrf

    <!-- JSON -->
    <div>
        <label>Paste Job JSON</label><br>
        <textarea name="job_json" rows="10" style="width:100%;" placeholder='Paste JSON here'></textarea>
    </div>

    <br>

    <!-- STATES CHECKBOX -->
    <div>
        <label><b>Select States</b></label><br>

        @foreach($states as $state)
            <label style="margin-right:10px;">
                <input type="checkbox" name="states[]" value="{{ $state->name }}">
                {{ $state->name }}
            </label>
        @endforeach
    </div>

    <br>

    <!-- CATEGORY SELECT -->
    <div>
        <label><b>Select Category</b></label><br>

        <select name="category_id" required>
            <option value="">-- Select Category --</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->name }}">
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
    </div>

    <br>

    <!-- Min Education -->
    <div>
        <label><b>Select Min Education</b></label><br>

        @foreach($mineducation as $minedu)
            <label style="margin-right:10px;">
                <input type="checkbox" name="minedus" value="{{ $minedu->name }}">
                {{ $minedu->name }}
            </label>
        @endforeach
    </div>

    <br>

    <button type="submit">Submit Job</button>
</form>