<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\StudyProgramme;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectsController extends BaseController
{

    public function index(){
        $subjects = Subject::orderBy('created_at', 'desc')
            ->when($study_programme = request('study_programme'), function ($q) use($study_programme){
                $q->where('study_programme_id', $study_programme);
            })
            ->with([ 'study_programme' ])
            ->get();

        $study_programmes = StudyProgramme::orderBy('name', 'asc')->get();

        return view('system.subjects.index', compact('subjects', 'study_programmes'));
    }

    public function create(){
        $study_programmes = StudyProgramme::orderBy('name', 'asc')->get();

        return view('system.subjects.create', compact('study_programmes'));
    }

    public function store(CreateSubjectRequest $request){
        $subject = Subject::create($request->all());

        $this->_setFlashMessage('success', "Predmet <b>$subject->name</b> bol úspešne vytvorený.");

        return redirect()->route('subjects.index');
    }

    public function edit($id){
        $subject = Subject::findOrFail($id);

        $study_programmes = StudyProgramme::orderBy('name', 'asc')->get();

        return view('system.subjects.edit', compact('subject', 'study_programmes'));
    }

    public function update(UpdateSubjectRequest $request, $id){
        $subject = Subject::findOrFail($id);

        $subject->update($request->all());

        $this->_setFlashMessage('success', "Predmet <b>$subject->name</b> bol úspešne upravený.");

        return back();
    }

    public function delete(Request $request, $id){
        $subject = Subject::findOrFail($id);

        $subject->delete();

        $this->_setFlashMessage('success', "Predmet <b>$subject->name</b> bol úspešne vymazaný.");

        return redirect()->route('subjects.index');
    }

}
