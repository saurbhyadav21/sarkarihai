<form action="{{ route('job.store.json') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label>Paste Job JSON</label><br>
        <textarea name="job_json" rows="10" style="width:100%;" placeholder="Paste JSON here"></textarea>
    </div>

    <br>

    <div>
        <label>Upload Image</label><br>
        <input type="file" name="job_image" accept="image/*">
    </div>

    <br>

    <button type="submit">Submit Job</button>
</form>