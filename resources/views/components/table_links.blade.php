<table id="table_links" class="table table-head-fixed text-nowrap">
    <thead>
      <tr>
        <th>URL</th>
        <th>Expire Date</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($links as $link)
        <tr>
            <td><a href="{{ route('single', ['refer' => $link->unique_url]) }}">{{ $link->unique_url }}</a></td>
            <td>{{ \Carbon\Carbon::parse($link->expires_at)->format('d.m.Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>