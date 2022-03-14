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
        @foreach($types as $type)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $type->name }}</td>
                <td>{{ $type->internships->count() }}</td>
                <td data-sort="{{ $type->created_at }}">{{ $type->formatTimestamp('created_at', 'd.m.Y H:i:s') }}</td>
                <td>
                    @if(auth()->user()->clearance('workplace_leader'))
                        <a href="{{ route('types.edit', $type) }}" title="Editovať" class="btn btn-warning action waves-effect waves-light">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <form action="{{ route('types.delete', $type) }}" method="post" style="display: inline-block;">
                            @csrf
                            <button data-entity="{{ "Typ zmluvy - $type->name" }}" type="button" title="Vymazať" class="btn btn-danger action waves-effect waves-light delete-button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
