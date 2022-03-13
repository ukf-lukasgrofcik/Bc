<table id="companies-datatable" class="datatable table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>#</th>
            <th>Študent</th>
            <th>Profesor</th>
            <th>Spoločnosť</th>
            <th>Status</th>
            <th data-orderable="false">Akcie</th>
        </tr>
    </thead>

    <tbody>
        @foreach($internships as $internship)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $internship->student->name }} {{ $internship->student->surname }}</td>
                <td>{{ $internship->tutor->name }} {{ $internship->tutor->surname }}</td>
                <td>{{ $internship->worker->company->name }}</td>
                <td>{{ $internship->status->name }}</td>
                <td>
                    <a href="{{ route('student.internship.entries.index', $internship) }}" title="Záznamy" class="btn btn-warning waves-effect waves-light action">
                        <i class="fa fa-folder-open"></i>
                    </a>

                    <a href="{{ route('student.internship.comments', $internship) }}" title="Komentáre" class="btn btn-info waves-effect waves-light action">
                        <i class="fa fa-comment"></i>
                    </a>

                    @if($file = $internship->statement)
                        <a href="{{ $file->full_path }}" target="_blank" title="Výkaz" class="btn btn-success waves-effect waves-light action">
                            <i class="fa fa-file"></i>
                        </a>
                    @else
                        <a href="{{ route('internships.statement', $internship) }}" title="Nahrať výkaz" class="btn btn-warning waves-effect waves-light action">
                            <i class="fa fa-file"></i>
                        </a>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
