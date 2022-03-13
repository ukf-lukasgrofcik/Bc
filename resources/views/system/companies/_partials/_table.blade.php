<table id="companies-datatable" class="datatable table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>Názov</th>
            <th>Adresa</th>
            <th>E-mail</th>
            <th>Registrácia</th>
            <th data-orderable="false">Akcie</th>
        </tr>
    </thead>

    <tbody>
        @foreach($companies as $company)
            <tr>
                <td>{{ $company->name }}</td>
                <td>{{ $company->address }}</td>
                <td>{{ $company->email }}</td>
                <td data-sort="{{ $company->created_at }}">{{ $company->formatTimestamp('created_at', 'd.m.Y H:i:s') }}</td>
                <td>
                    <a href="{{ route('companies.edit', $company) }}" title="Editovať" class="btn btn-warning action waves-effect waves-light">
                        <i class="fas fa-pencil-alt"></i>
                    </a>

                    @if($company->owner)
                        <a href="{{ route('users.index', [ 'company' => $company->id ]) }}" title="Zamestnanci" class="btn btn-info action waves-effect waves-light">
                            <i class="fas fa-users"></i>
                        </a>
                    @endif

                    <form action="{{ route('companies.delete', $company) }}" method="post" style="display: inline-block;">
                        @csrf
                        <button data-entity="{{ "Spoločnosť $company->name" }}" type="button" title="Vymazať" class="btn btn-danger action waves-effect waves-light delete-button">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
