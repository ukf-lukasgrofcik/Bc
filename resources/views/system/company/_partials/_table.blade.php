<table id="companies-datatable" class="datatable table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>#</th>
            <th>Študent</th>
            <th>Profesor</th>
            <th>Zodpovedná osoba</th>
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
                <td>
                    @if(isset($internship->worker))
                        {{ $internship->worker->name }} {{ $internship->worker->surname }}
                    @else
                        <i>Nepriradené</i>
                    @endif
                </td>
                <td>{{ $internship->status->name }}</td>
                <td>
                    @if(! isset($internship->worker))
                        <a href="{{ route('company.internships.assign_employee', $internship) }}" title="Priradiť zodpovednú osobu" class="btn btn-warning waves-effect waves-light action">
                            <i class="fa fa-user"></i>
                        </a>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
