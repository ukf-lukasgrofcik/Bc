<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudyProgrammeRequest;
use App\Http\Requests\UpdateStudyProgrammeRequest;
use App\Models\StudyProgramme;
use Illuminate\Http\Request;

class StudyProgrammesController extends BaseController
{

    public function index(){
        $study_programmes = StudyProgramme::orderBy('created_at', 'desc')->get();

        return view('system.study_programmes.index', compact('study_programmes'));
    }

    public function create(){
        return view('system.study_programmes.create');
    }

    public function store(CreateStudyProgrammeRequest $request){
        $study_programme = StudyProgramme::create($request->all());

        $this->_setFlashMessage('success', "Študíjny program <b>$study_programme->name</b> bol úspešne vytvorený.");

        return redirect()->route('study_programmes.index');
    }

    public function edit($id){
        $study_programme = StudyProgramme::findOrFail($id);

        return view('system.study_programmes.edit', compact('study_programme'));
    }

    public function update(UpdateStudyProgrammeRequest $request, $id){
        $study_programme = StudyProgramme::findOrFail($id);

        $study_programme->update($request->all());

        $this->_setFlashMessage('success', "Študíjny program <b>$study_programme->name</b> bol úspešne upravený.");

        return back();
    }

    public function delete(Request $request, $id){
        $study_programme = StudyProgramme::findOrFail($id);

        $study_programme->delete();

        $this->_setFlashMessage('success', "Študíjny program <b>$study_programme->name</b> bol úspešne vymazaný.");

        return redirect()->route('study_programmes.index');
    }

}
