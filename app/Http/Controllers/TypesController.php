<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Models\Type;
use Illuminate\Http\Request;

class TypesController extends BaseController
{

    public function index(){
        $types = Type::orderBy('created_at', 'desc')->get();

        return view('system.types.index', compact('types'));
    }

    public function create(){
        return view('system.types.create');
    }

    public function store(CreateTypeRequest $request){
        $type = Type::create($request->all());

        $this->_setFlashMessage('success', "Typ zmluvy <b>$type->name</b> bol úspešne vytvorený.");

        return redirect()->route('types.index');
    }

    public function edit($id){
        $type = Type::findOrFail($id);

        return view('system.types.edit', compact('type'));
    }

    public function update(UpdateTypeRequest $request, $id){
        $type = Type::findOrFail($id);

        $type->update($request->all());

        $this->_setFlashMessage('success', "Typ zmluvy <b>$type->name</b> bol úspešne upravený.");

        return back();
    }

    public function delete(Request $request, $id){
        $type = Type::findOrFail($id);

        $type->delete();

        $this->_setFlashMessage('success', "Typ zmluvy <b>$type->name</b> bol úspešne vymazaný.");

        return redirect()->route('types.index');
    }

}
