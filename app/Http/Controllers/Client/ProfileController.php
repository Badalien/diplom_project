<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user();

        return view('profile.show', [
            'user' => $user
        ]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();

        return view('profile.edit', [
            'user' => $user
        ]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function password()
    {
        return view('profile.password');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $user = Auth::user();

        $validate = Validator::make($request->input(), [
            'name' => ['required', 'string', 'min:1', 'max:255'],
            'patronymic' => ['required', 'string', 'min:1', 'max:255'],
            'second_name' => ['required', 'string', 'min:1', 'max:255'],
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }

        $user->name = $request->name ?? '';
        $user->patronymic = $request->patronymic ?? '';
        $user->second_name = $request->second_name ?? '';
        $user->address = $request->address ?? '';
        $user->phone = $request->phone ?? '';
        $user->date_bf = $request->date_bf ?? null;
        $user->save();

        return redirect('/profile');
    }
}
