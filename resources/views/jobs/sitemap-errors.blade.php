<table class="table table-bordered">

    <tr>
        <th>#</th>
        <th>Status</th>
        <th>URL</th>
    </tr>

    @foreach($results as $i => $row)

        <tr style="
            @if($row['status']==500) background:#ffcccc;
            @elseif($row['status']==404) background:#ffe6cc;
            @elseif($row['status']==200) background:#e8ffe8;
            @endif
        ">

            <td>{{ $i+1 }}</td>

            <td>{{ $row['status'] }}</td>

            <td>
                <a href="{{ $row['url'] }}" target="_blank">
                    {{ $row['url'] }}
                </a>
            </td>

        </tr>

    @endforeach

</table>