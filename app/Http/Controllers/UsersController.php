<?php

namespace App\Http\Controllers;

use App\Http\Requests\InviteUserRequest;
use App\Models\Company;
use App\Models\RegistrationLink;
use App\Models\User;
use App\Models\Workplace;

class UsersController extends BaseController
{

    public function index(){
        $users = User::orderBy('created_at', 'desc')
            ->where('role', '!=', 'superadmin')
            ->when($role = request('role'), function ($q) use ($role){
                $q->where('role', $role);
            })
            ->when($workplace = request('workplace'), function ($q) use ($workplace){
                $q->where('workplace_id', $workplace);
            })
            ->when($company = request('company'), function ($q) use ($company){
                $q->where('company_id', $company);
            })
            ->get();

        $workplaces = Workplace::orderBy('name', 'asc')->get();
        $companies = Company::orderBy('name', 'asc')->get();

        return view('system.users.index', compact('users', 'workplaces', 'companies'));
    }

    public function create(){
        $workplaces = Workplace::orderBy('name', 'asc')->get();
        $companies = Company::orderBy('name', 'asc')->get();

        return view('system.users.create', compact('companies', 'workplaces'));
    }

    public function store(InviteUserRequest $request){
        $inviter = auth()->user()->name . ' ' . auth()->user()->surname;
        $assigned_id = $this->_get_assigned_id($request);

        invite_user($inviter, $request->email, $request->role, $assigned_id);

        $this->_setFlashMessage('success', "Pozvánka pre rolu <b>".trans("clearance.$request->role")."</b> bola odoslaná na <b>$request->email</b>.");

        return redirect()->route('users.index');
    }

    private function _get_assigned_id($request){
        switch ($request->role){
            case 'owner':
            case 'employee':
                return $request->company_id;
            case 'workplace_leader':
            case 'lecturer':
                return $request->workplace_id;
        }
        return null;
    }

}
