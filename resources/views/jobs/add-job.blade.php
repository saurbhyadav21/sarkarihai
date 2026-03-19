<form action="{{ route('job.store.json') }}" method="POST">
    @csrf

    <div>
        <label>Paste Job JSON</label><br>
        <textarea name="job_json" rows="10" style="width:100%;" placeholder='Paste JSON here'></textarea>
    </div>

    <br>
    <button type="submit">Submit Job</button>
</form>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

@if($errors->any())
    <ul style="color:red;">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif