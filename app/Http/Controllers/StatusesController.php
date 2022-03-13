<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStatusRequest;
use App\Http\Requests\UpdateStatusRequest;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusesController extends BaseController
{

    public function index(){
        $statuses = Status::orderBy('created_at', 'desc')
            ->with([ 'internships' ])
            ->get();

        return view('system.statuses.index', compact('statuses'));
    }

    public function create(){
        return view('system.statuses.create');
    }

    public function store(CreateStatusRequest $request){
        $status = Status::create($request->all());

        $this->_setFlashMessage('success', "Status <b>$status->name</b> bol úspešne vytvorený.");

        return redirect()->route('statuses.index');
    }

    public function edit($id){
        $status = Status::findOrFail($id);

        return view('system.statuses.edit', compact('status'));
    }

    public function update(UpdateStatusRequest $request, $id){
        $status = Status::findOrFail($id);

        $status->update($request->all());

        $this->_setFlashMessage('success', "Status <b>$status->name</b> bol úspešne upravený.");

        return back();
    }

    public function delete(Request $request, $id){
        $status = Status::findOrFail($id);

        $status->delete();

        $this->_setFlashMessage('success', "Status <b>$status->name</b> bol úspešne vymazaný.");

        return redirect()->route('statuses.index');
    }

}
