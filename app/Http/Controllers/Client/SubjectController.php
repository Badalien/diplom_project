<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Subjects;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Finder\Exception\AccessDeniedException;

class SubjectController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $subjects = Subjects::all();

        return view('subjects.show', [
            'subjects' => $subjects,
        ]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('subjects.create');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $user = Auth::user();
        if (!$user || $user->role != User::ADMIN_ROLE) {
            return redirect()->back()->withException(new AccessDeniedException());
        }
        $validate = Validator::make($request->input(), [
            'name' => ['required', 'string', 'min:1', 'max:255'],
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }

        Subjects::create([
            'name' => $request->name ?? 'subject_name',
            'description' => $request->description ?? '',
            'user_id' => $user->id
        ]);

        return redirect('/subjects');
    }
}
