<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInternshipRequest;
use App\Http\Requests\UpdateInternshipRequest;
use App\Http\Requests\UploadCertificationRequest;
use App\Http\Requests\UploadStatementRequest;
use App\Models\AcademicYear;
use App\Models\Internship;
use App\Models\Status;
use App\Models\StudyProgramme;
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
            ->when($academic_year = request('academic_year'), function ($q) use ($academic_year){
                $q->where('academic_year_id', $academic_year);
            })
            ->when($study_programme = request('study_programme'), function ($q) use ($study_programme){
                $q->whereHas('subject', function ($q) use ($study_programme){
                    $q->where('study_programme_id', $study_programme);
                });
            })
            ->when(auth()->user()->role == 'lecturer', function ($q){
                $q->where('tutor_id', auth()->id());
            })
            ->when(auth()->user()->role == 'workplace_leader', function ($q){
                $q->whereIn('tutor_id', auth()->user()->workplace->lecturers->pluck('id'));
            })
            ->with([ 'tutor', 'worker', 'worker.company', 'company', 'student', 'status', 'files', 'academic_year' ])
            ->get();
        $statuses = Status::all();
        $academic_years = AcademicYear::all();
        $study_programmes = StudyProgramme::all();

        return view('system.internships.index', compact('internships', 'statuses', 'academic_years', 'study_programmes'));
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

    public function certification(Internship $internship){
        return view('system.internships.certification', compact('internship'));
    }

    public function certification_upload(UploadCertificationRequest $request, Internship $internship){
        $this->upload_file('certification', 'internships', $internship, 'certification');

        $internship->save();

        $this->_setFlashMessage('success', "Osvedčenie bolo úspešne nahraté.");

        return back();
    }

    public function approve(Internship $internship){
        $internship->status_id = status('approved')->id;
        $internship->save();

        $this->_setFlashMessage('success', "Odborná prax bola úspešne schválená.");

        return back();
    }

    public function archive(Internship $internship){
        $internship->status_id = status('archived')->id;
        $internship->save();

        $this->_setFlashMessage('success', "Odborná prax bola úspešne archivovaná.");

        return back();
    }

}
