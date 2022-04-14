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
        @foreach($academic_years as $academic_year)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $academic_year->name }}</td>
                <td>{{ $academic_year->internships->count() }}</td>
                <td data-sort="{{ $academic_year->created_at }}">{{ $academic_year->formatTimestamp('created_at', 'd.m.Y H:i:s') }}</td>
                <td>
                    <a href="{{ route('academic_years.edit', $academic_year) }}" title="Editovať" class="btn btn-warning action waves-effect waves-light">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    @if($academic_year->internships->count() == 0)
                        <form action="{{ route('academic_years.delete', $academic_year) }}" method="post" style="display: inline-block;">
                            @csrf
                            <button data-entity="{{ "Akademický rok - $academic_year->name" }}" type="button" title="Vymazať" class="btn btn-danger action waves-effect waves-light delete-button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
