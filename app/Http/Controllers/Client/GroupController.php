<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Groups;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Finder\Exception\AccessDeniedException;

class GroupController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $groups = Groups::all();

        return view('groups.show', [
            'groups' => $groups,
        ]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('groups.create');
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

        Groups::create([
            'name' => $request->name ?? 'group_name',
            'description' => $request->description ?? '',
            'user_id' => $user->id
        ]);

        return redirect('/groups');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function delete(int $id)
    {
        $user = Auth::user();
        if (!$user || $user->role != User::ADMIN_ROLE) {
            return redirect()->back()->withException(new AccessDeniedException());
        }

        $group = Groups::find($id);
        $group->forceDelete();

        return redirect('/groups');
    }
}
