<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInternshipRequest;
use App\Http\Requests\UpdateInternshipRequest;
use App\Http\Requests\UploadStatementRequest;
use App\Models\Internship;
use App\Models\Status;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;

class InternshipsController extends BaseController
{
    use UploadTrait;

    public function index(){
        $internships = Internship::orderBy('created_at', 'desc')
            ->when($status = request('status'), function ($q) use ($status){
                $q->where('status_id', $status);
            })
            ->when(auth()->user()->role == 'lecturer', function ($q){
                $q->where('tutor_id', auth()->id());
            })
            ->when(auth()->user()->role == 'workplace_leader', function ($q){
                $q->whereIn('tutor_id', auth()->user()->workplace->lecturers->pluck('id'));
            })
            ->with([ 'tutor', 'worker', 'worker.company', 'company', 'student', 'status', 'files' ])
            ->get();
        $statuses = Status::all();

        return view('system.internships.index', compact('internships', 'statuses'));
    }

    public function statement(Internship $internship){
        return view('system.internships.statement', compact('internship'));
    }

    public function statement_upload(UploadStatementRequest $request, Internship $internship){
        $this->upload_file('statement', 'internships', $internship, 'statement');

        $internship->status_id = status('finished')->id;
        $internship->save();

        $this->_setFlashMessage('success', "Výkaz bol úspešne nahratý.");

        return back();
    }

}
