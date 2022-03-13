<table id="admins-datatable" class="datatable table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>Používateľ</th>
            <th>E-mail</th>
            <th>Rola</th>
            <th>Registrácia</th>
            <th data-orderable="false">Akcie</th>
        </tr>
    </thead>

    <tbody>
        @foreach($users as $user)
            <tr class="{{ auth()->id() == $user->id ? 'bg-light' : '' }}">
                <td>{{ "$user->name $user->surname" }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->formatted_role }}</td>
                <td data-sort="{{ $user->created_at }}">{{ $user->formatTimestamp('created_at', 'd.m.Y H:i:s') }}</td>
                <td>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
