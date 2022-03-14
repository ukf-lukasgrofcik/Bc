<table id="companies-datatable" class="datatable table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>#</th>
            <th>Názov</th>
            <th>Počet predmetov</th>
            <th>Pridané dňa</th>
            <th data-orderable="false">Akcie</th>
        </tr>
    </thead>

    <tbody>
        @foreach($study_programmes as $study_programme)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $study_programme->name }}</td>
                <td>{{ $study_programme->subjects->count() }}</td>
                <td data-sort="{{ $study_programme->created_at }}">{{ $study_programme->formatTimestamp('created_at', 'd.m.Y H:i:s') }}</td>
                <td>
                    @if(auth()->user()->clearance('workplace_leader'))
                        <a href="{{ route('study_programmes.edit', $study_programme) }}" title="Editovať" class="btn btn-warning action waves-effect waves-light">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    @endif

                    <a href="{{ route('subjects.index', [ 'study_programme' => $study_programme->id ]) }}" title="Predmety" class="btn btn-info action waves-effect waves-light">
                        <i class="fas fa-book"></i>
                    </a>
                    @if(auth()->user()->clearance('workplace_leader'))
                        <form action="{{ route('study_programmes.delete', $study_programme) }}" method="post" style="display: inline-block;">
                            @csrf
                            <button data-entity="{{ "Študíjny program - $study_programme->name" }}" type="button" title="Vymazať" class="btn btn-danger action waves-effect waves-light delete-button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
