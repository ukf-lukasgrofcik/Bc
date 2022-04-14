<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAcademicYearRequest;
use App\Http\Requests\UpdateAcademicYearRequest;
use App\Models\AcademicYear;
use Illuminate\Http\Request;

class AcademicYearsController extends BaseController
{

    public function index(){
        $academic_years = AcademicYear::orderBy('created_at', 'desc')
            ->with([ 'internships' ])
            ->get();

        return view('system.academic_years.index', compact('academic_years'));
    }

    public function create(){
        return view('system.academic_years.create');
    }

    public function store(CreateAcademicYearRequest $request){
        $academic_year = AcademicYear::create($request->all());

        $this->_setFlashMessage('success', "Akademický rok <b>$academic_year->name</b> bol úspešne vytvorený.");

        return redirect()->route('academic_years.index');
    }

    public function edit($id){
        $academic_year = AcademicYear::findOrFail($id);

        return view('system.academic_years.edit', compact('academic_year'));
    }

    public function update(UpdateAcademicYearRequest $request, $id){
        $academic_year = AcademicYear::findOrFail($id);

        $academic_year->update($request->all());

        $this->_setFlashMessage('success', "Akademický rok <b>$academic_year->name</b> bol úspešne upravený.");

        return back();
    }

    public function delete(Request $request, $id){
        $academic_year = AcademicYear::findOrFail($id);

        $academic_year->delete();

        $this->_setFlashMessage('success', "Akademický rok <b>$academic_year->name</b> bol úspešne vymazaný.");

        return redirect()->route('academic_years.index');
    }

}
