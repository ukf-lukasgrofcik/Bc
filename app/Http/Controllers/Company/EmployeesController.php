<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\InviteEmployeeRequest;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeesController extends BaseController
{

    public function index(){
        $users = auth()->user()->company->orderBy('created_at', 'desc')->get();

        return view('system.company.users.index', compact('users'));
    }

    public function store(InviteEmployeeRequest $request){
        $inviter = auth()->user()->name . ' ' . auth()->user()->surname;

        invite_user($inviter, $request->email, 'employee', auth()->user()->company->id);

        $this->_setFlashMessage('success', "Pozvánka pre rolu <b>".trans("clearance.employee")."</b> bola odoslaná na <b>$request->email</b>.");

        return redirect()->route('company.employees.index');
    }

}
