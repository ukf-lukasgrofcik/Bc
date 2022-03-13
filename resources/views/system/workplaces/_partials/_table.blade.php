<table id="companies-datatable" class="datatable table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>Názov</th>
            <th>Adresa</th>
            <th>Vedúci pracoviska</th>
            <th>Registrácia</th>
            <th data-orderable="false">Akcie</th>
        </tr>
    </thead>

    <tbody>
        @foreach($workplaces as $workplace)
            <tr>
                <td>{{ $workplace->name }}</td>
                <td>{{ $workplace->address }}</td>
                <td>{{ $workplace->leader ? $workplace->leader->name . ' ' . $workplace->leader->surname : '-' }}</td>
                <td data-sort="{{ $workplace->created_at }}">{{ $workplace->formatTimestamp('created_at', 'd.m.Y H:i:s') }}</td>
                <td>
                    @if(auth()->user()->clearance('workplace_leader'))
                        <a href="{{ route('workplaces.edit', $workplace) }}" title="Editovať" class="btn btn-warning action waves-effect waves-light">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    @endif

                    <a href="{{ route('users.index', [ 'workplace' => $workplace->id ]) }}" title="Profesori" class="btn btn-info action waves-effect waves-light">
                        <i class="fas fa-users"></i>
                    </a>

                        @if(auth()->user()->clearance('workplace_leader'))
                            <form action="{{ route('workplaces.delete', $workplace) }}" method="post" style="display: inline-block;">
                                @csrf
                                <button data-entity="{{ "Pracovisko $workplace->name" }}" type="button" title="Vymazať" class="btn btn-danger action waves-effect waves-light delete-button">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
