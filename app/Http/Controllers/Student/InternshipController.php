<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\BaseController;
use App\Http\Requests\CreateInternshipRequest;
use App\Models\Company;
use App\Models\Internship;
use App\Models\Status;
use App\Models\StudyProgramme;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;

class InternshipController extends BaseController
{

    public function internship(){
        $internship = auth()->user()->internship;

        return view('system.student.internship', compact('internship'));
    }

    public function create(){
        $types = Type::orderBy('name', 'asc')->get();
        $study_programmes = StudyProgramme::orderBy('name', 'asc')->get();
        $companies = Company::orderBy('name', 'asc')->get();
        $tutors = User::role(['lecturer', 'workplace_leader', 'admin'])->orderBy('name', 'asc')->get();

        return view('system.student.create', compact('types', 'study_programmes', 'companies', 'tutors'));
    }

    public function store(CreateInternshipRequest $request){
        $company = null;
        if(! isset($request->company_id)){
            $company = Company::create($request->company);

            $inviter = auth()->user()->name . " " . auth()->user()->surname;
            invite_user($inviter, $company->email, 'owner', $company->id);
        }

        $internship = Internship::create([
            'academic_year' => $request->academic_year,
            'student_id' => auth()->id(),
            'tutor_id' => $request->tutor_id,
            'company_id' => isset($company) ? $company->id : $request->company_id,
            'status_id' => status('created')->id,
            'type_id' => $request->type_id,
            'subject_id' => $request->subject_id,
        ]);

        $this->_setFlashMessage('success', "Odborná prax bola vytvorená.");

        return redirect()->route('student.internship');
    }

    public function ajax_study_programme(Request $request){
        $study_programme = StudyProgramme::findOrFail($request->id);

        $subjects = $study_programme->subjects()
            ->get([ 'id as value', 'name as option' ])
            ->toArray();

        return response()->json([
            'subjects' => $subjects,
        ], 200);
    }

}
