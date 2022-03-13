<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInternshipRequest;
use App\Http\Requests\UpdateInternshipRequest;
use App\Models\Internship;
use Illuminate\Http\Request;

class InternshipsController extends BaseController
{

    public function index(){
        $internships = Internship::orderBy('created_at', 'desc')->get();

        return view('system.internships.index', compact('internships'));
    }

    public function create(){
        return view('system.internships.create');
    }

    public function store(CreateInternshipRequest $request){
        $internship = Internship::create($request->all());

        return redirect()->route('internships.index');
    }

    public function edit($id){
        $internship = Internship::findOrFail($id);

        return view('system.internships.edit', compact('internship'));
    }

    public function update(UpdateInternshipRequest $request, $id){
        $internship = Internship::findOrFail($id);

        $internship->update($request->all());

        return back();
    }

    public function delete(Request $request, $id){
        $internship = Internship::findOrFail($id);

        $internship->delete();

        return redirect()->route('internships.index');
    }

}
