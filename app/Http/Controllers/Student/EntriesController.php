<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\BaseController;
use App\Http\Requests\CreateEntryRequest;
use App\Http\Requests\UpdateEntryRequest;
use App\Models\Entry;
use App\Models\Internship;
use App\Traits\DeleteTrait;
use App\Traits\UploadTrait;

class EntriesController extends BaseController
{
    use UploadTrait, DeleteTrait;

    public function index(Internship $internship){
        $entries = $internship->entries;

        return view('system.student.entries.index', compact('internship', 'entries'));
    }

    public function create(Internship $internship){
        return view('system.student.entries.create', compact('internship'));
    }

    public function store(CreateEntryRequest $request, Internship $internship){
        $entry = $internship->entries()->create($request->all());

        $this->upload_file('file', 'entries', $entry);

        $this->_setFlashMessage('success', "Záznam pre Vašu prax bol pridaný.");

        return redirect()->route('student.internship.entries.index', $internship);
    }

    public function edit(Internship $internship, Entry $entry){
        return view('system.student.entries.edit', compact('internship', 'entry'));
    }

    public function update(UpdateEntryRequest $request, Internship $internship, Entry $entry){
        $entry->update($request->all());

        $this->upload_file('file', 'entries', $entry);

        $this->_setFlashMessage('success', "Záznam pre Vašu prax bol upravený.");

        return redirect()->route('student.internship.entries.edit', [$internship, $entry]);
    }


    public function delete(Internship $internship, Entry $entry){
        $this->delete_files($entry->files);

        $entry->delete();

        $this->_setFlashMessage('success', "Záznam pre Vašu prax bol vymazaný.");

        return redirect()->route('student.internship.entries.index', $internship);
    }

}
