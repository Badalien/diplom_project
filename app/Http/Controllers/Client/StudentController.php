<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Groups;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Finder\Exception\AccessDeniedException;

class StudentController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $students = User::where(['role' => 'student'])->get();

        return view('students.show', [
            'students' => $students,
        ]);
    }
}
