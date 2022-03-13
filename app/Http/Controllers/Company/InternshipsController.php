<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\BaseController;
use App\Http\Requests\AssignEmployeeRequest;
use App\Models\Internship;

class InternshipsController extends BaseController
{

    public function internships(){
        $internships = auth()->user()->role == 'owner'
            ? auth()->user()->company->internships
            : auth()->user()->employee_internships;

        return view('system.company.internships', compact('internships'));
    }

    public function assign_employee(Internship $internship){
        $employees = auth()->user()->company->employees;

        return view('system.company.assign', compact('internship', 'employees'));
    }

    public function assign(AssignEmployeeRequest $request, Internship $internship){
        $employee = auth()->user()->company->employees()->findOrFail($request->worker_id);

        $internship->worker_id = $employee->id;
        $internship->status_id = status('approved');
        $internship->save();

        $this->_setFlashMessage('success', "Zamestnancovi $employee->name $employee->surname bola priradená odborná prax študenta " . $internship->student->name . " " . $internship->student->surname);

        return redirect()->route('company.internships');
    }

}
