<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\BaseController;
use App\Http\Requests\CreateCommentRequest;
use App\Models\Internship;

class CommentsController extends BaseController
{

    public function index(Internship $internship){
        $comments = $internship->comments;

        return view('system.student.comments', compact('comments', 'internship'));
    }

    public function store(CreateCommentRequest $request, Internship $internship){
        $comment = $internship->comments()->create([
            'text' => $request->text,
            'user_id' => auth()->id(),
        ]);

        $this->_setFlashMessage('success', "Komentár bol úspešne pridaný.");

        return redirect()->route('student.internship.comments', $internship);
    }

}
