<table id="companies-datatable" class="datatable table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>#</th>
            <th>Názov</th>
            <th>Počet odborných praxí</th>
            <th>Pridané dňa</th>
            <th data-orderable="false">Akcie</th>
        </tr>
    </thead>

    <tbody>
        @foreach($statuses as $status)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $status->name }}</td>
                <td>{{ $status->internships->count() }}</td>
                <td data-sort="{{ $status->created_at }}">{{ $status->formatTimestamp('created_at', 'd.m.Y H:i:s') }}</td>
                <td>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
