<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWorkplaceRequest;
use App\Http\Requests\UpdateWorkplaceRequest;
use App\Models\Workplace;
use Illuminate\Http\Request;

class WorkplacesController extends BaseController
{

    public function index(){
        $workplaces = Workplace::orderBy('created_at', 'desc')
            ->with([ 'leader' ])
            ->get();

        return view('system.workplaces.index', compact('workplaces'));
    }

    public function create(){
        return view('system.workplaces.create');
    }

    public function store(CreateWorkplaceRequest $request){
        $workplace = Workplace::create($request->all());

        $this->_setFlashMessage('success', "Pracovisko <b>$workplace->name</b> bolo úspešne vytvorené.");

        return redirect()->route('workplaces.index');
    }

    public function edit($id){
        $workplace = Workplace::findOrFail($id);

        return view('system.workplaces.edit', compact('workplace'));
    }

    public function update(UpdateWorkplaceRequest $request, $id){
        $workplace = Workplace::findOrFail($id);

        $workplace->update($request->all());

        $this->_setFlashMessage('success', "Pracovisko <b>$workplace->name</b> bolo úspešne upravené.");

        return back();
    }

    public function delete(Request $request, $id){
        $workplace = Workplace::findOrFail($id);

        $workplace->delete();

        $this->_setFlashMessage('success', "Pracovisko <b>$workplace->name</b> bolo úspešne vymazané.");

        return redirect()->route('workplaces.index');
    }

}
