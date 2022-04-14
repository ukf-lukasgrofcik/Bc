<table id="companies-datatable" class="datatable table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>#</th>
            <th>Akademický rok</th>
            <th>Študijný program</th>
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
                <td>{{ $internship->academic_year->name }}</td>
                <td>{{ $internship->subject->study_programme->name }}</td>
                <td>{{ $internship->student->name }} {{ $internship->student->surname }}</td>
                <td>{{ $internship->tutor->name }} {{ $internship->tutor->surname }}</td>
                <td>{{ $internship->company->name }}</td>
                <td>{{ $internship->status->name }}</td>
                <td>
                    @if($internship->status->slug == 'created')
                        <form action="{{ route('internships.approve', $internship) }}" method="post" style="display: inline-block;">
                            @csrf
                            <button data-entity="{{ "Schváliť odbornú prax študenta - " . $internship->student->name . " " . $internship->student->surname }}" type="button" title="Schváliť" class="btn btn-success action waves-effect waves-light confirm-button">
                                <i class="fas fa-check"></i>
                            </button>
                        </form>
                    @endif

                    @if($internship->status->slug != 'archived' && $internship->status->slug != 'created')
                        <a href="{{ route('student.internship.entries.index', $internship) }}" title="Záznamy" class="btn btn-warning waves-effect waves-light action">
                            <i class="fa fa-folder-open"></i>
                        </a>

                        <a href="{{ route('student.internship.comments', $internship) }}" title="Komentáre" class="btn btn-info waves-effect waves-light action">
                            <i class="fa fa-comment"></i>
                        </a>
                    @endif

                    @if($file = $internship->contract)
                        <a href="{{ $file->full_path }}" target="_blank" title="Dohoda o brigádnickej činnosti" class="btn btn-info waves-effect waves-light action">
                            <i class="fa fa-file"></i>
                        </a>
                    @endif

                    @if($file = $internship->statement)
                         <a href="{{ $file->full_path }}" target="_blank" title="Výkaz" class="btn btn-success waves-effect waves-light action">
                             <i class="fa fa-file"></i>
                         </a>
                    @else
                         <a href="{{ route('internships.statement', $internship) }}" title="Nahrať výkaz" class="btn btn-warning waves-effect waves-light action">
                             <i class="fa fa-file"></i>
                         </a>
                    @endif

                    @if($file = $internship->certification)
                        <a href="{{ $file->full_path }}" target="_blank" title="Osvedčenie" class="btn btn-success waves-effect waves-light action">
                            <i class="fa fa-file"></i>
                        </a>
                    @else
                        <a href="{{ route('internships.certification', $internship) }}" title="Nahrať osvedčenie" class="btn btn-warning waves-effect waves-light action">
                            <i class="fa fa-file"></i>
                        </a>
                    @endif

                    @if($internship->status->slug == 'finished')
                        <form action="{{ route('internships.archive', $internship) }}" method="post" style="display: inline-block;">
                            @csrf
                            <button data-entity="{{ "Archivovať odbornú prax študenta - " . $internship->student->name . " " . $internship->student->surname }}" type="button" title="Archivovať" class="btn btn-danger action waves-effect waves-light confirm-button">
                                <i class="fas fa-archive"></i>
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
