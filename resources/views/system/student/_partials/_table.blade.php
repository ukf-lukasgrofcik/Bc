<table id="companies-datatable" class="datatable table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>Akademický rok</th>
            <th>Spoločnosť</th>
            <th>Zodpovedná osoba</th>
            <th>Profesor</th>
            <th>Predmet / Študíjny program</th>
            <th>Status</th>
            <th data-orderable="false">Akcie</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{ $internship->academic_year->name }}</td>
            <td>{{ $internship->company->name }}</td>
            <td>
                @if(isset($internship->worker))
                    {{ $internship->worker->name }} {{ $internship->worker->surname }}
                @else
                    <i>Nepriradená</i>
                @endif
            </td>
            <td>{{ $internship->tutor->name }} {{ $internship->tutor->surname }}</td>
            <td>{{ $internship->subject->name }} / {{ $internship->subject->study_programme->name }}</td>
            <td>{{ $internship->status->name }}</td>
            <td>
                @if($internship->status->slug != 'created' && $internship->status->slug != 'archived')
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
                @endif

                @if($file = $internship->certification)
                    <a href="{{ $file->full_path }}" target="_blank" title="Osvedčenie" class="btn btn-success waves-effect waves-light action">
                        <i class="fa fa-file"></i>
                    </a>
                @endif
            </td>
        </tr>
    </tbody>
</table>
