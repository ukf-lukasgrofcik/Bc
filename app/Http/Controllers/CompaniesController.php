<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompaniesController extends BaseController
{

    public function index(){
        $companies = Company::orderBy('created_at', 'desc')
            ->with([ 'owner' ])
            ->get();

        return view('system.companies.index', compact('companies'));
    }

    public function create(){
        return view('system.companies.create');
    }

    public function store(CreateCompanyRequest $request){
        $company = Company::create($request->all());

        $this->_setFlashMessage('success', "Spoločnosť <b>$company->name</b> bola úspešne vytvorená.");

        return redirect()->route('companies.index');
    }

    public function edit($id){
        $company = Company::findOrFail($id);

        return view('system.companies.edit', compact('company'));
    }

    public function update(UpdateCompanyRequest $request, $id){
        $company = Company::findOrFail($id);

        $company->update($request->all());

        $this->_setFlashMessage('success', "Spoločnosť <b>$company->name</b> bola úspešne upravená.");

        return back();
    }

    public function delete(Request $request, $id){
        $company = Company::findOrFail($id);

        $company->delete();

        $this->_setFlashMessage('success', "Spoločnosť <b>$company->name</b> bola úspešne vymazaná.");

        return redirect()->route('companies.index');
    }

}
