<table id="table_history" class="table table-head-fixed text-nowrap">
<thead>
    <tr>
        <th>Win Amount</th>
        <th>Date</th>
    </tr>
</thead>
<tbody>
    @foreach ($history as $row)
        <tr>
            <td>${{ $row->win_amount }}</td>
            <td>{{ $row->created_at }}</td>
        </tr>
    @endforeach
</tbody>
</table>