<table id="companies-datatable" class="datatable table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>#</th>
            <th>Názov</th>
            <th>Študíjny program</th>
            <th>Pridané dňa</th>
            <th data-orderable="false">Akcie</th>
        </tr>
    </thead>

    <tbody>
        @foreach($subjects as $subject)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $subject->name }}</td>
                <td>{{ $subject->study_programme->name }}</td>
                <td data-sort="{{ $subject->created_at }}">{{ $subject->formatTimestamp('created_at', 'd.m.Y H:i:s') }}</td>
                <td>
                    <a href="{{ route('subjects.edit', $subject) }}" title="Editovať" class="btn btn-warning action waves-effect waves-light">
                        <i class="fas fa-pencil-alt"></i>
                    </a>

                    <form action="{{ route('subjects.delete', $subject) }}" method="post" style="display: inline-block;">
                        @csrf
                        <button data-entity="{{ "Predmet - $subject->name" }}" type="button" title="Vymazať" class="btn btn-danger action waves-effect waves-light delete-button">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
