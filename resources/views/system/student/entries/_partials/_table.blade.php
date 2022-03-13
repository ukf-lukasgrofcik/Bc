<table id="companies-datatable" class="datatable table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>#</th>
            <th>Text</th>
            <th>Pridané dňa</th>
            <th data-orderable="false">Akcie</th>
        </tr>
    </thead>

    <tbody>
        @foreach($entries as $entry)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <span title="{{ $entry->text }}">{{ \Illuminate\Support\Str::limit($entry->text, 60) }}</span>
                </td>
                <td data-sort="{{ $entry->created_at }}">{{ $entry->formatTimestamp('created_at', 'd.m.Y H:i:s') }}</td>
                <td>
                    <a href="{{ route('student.internship.entries.edit', [$internship, $entry]) }}" title="Editovať" class="btn btn-warning action waves-effect waves-light">
                        <i class="fas fa-pencil-alt"></i>
                    </a>

                    @if($file = $entry->file)
                        <a href="{{ asset($file->full_path) }}" target="_blank" title="Dokument" class="btn btn-success waves-effect waves-light action">
                            <i class="fa fa-file"></i>
                        </a>
                    @endif

                    <form action="{{ route('student.internship.entries.delete', [$internship, $entry]) }}" method="post" style="display: inline-block;">
                        @csrf
                        <button data-entity="{{ "Záznam - $loop->iteration" }}" type="button" title="Vymazať" class="btn btn-danger action waves-effect waves-light delete-button">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
