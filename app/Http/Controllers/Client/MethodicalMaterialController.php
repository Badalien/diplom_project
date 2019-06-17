<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Folders;
use App\Models\Groups;
use App\Models\MethodicalMaterial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Finder\Exception\AccessDeniedException;

class MethodicalMaterialController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request)
    {
        $user = Auth::user();
        $materials = MethodicalMaterial::whereNotNull('user_id');
        $folders = Folders::whereNotNull('name');
        $path_id = $request->path_id ?? '';
        if ($path_id) {
            $materials->where(['path_id' => $path_id]);
            $folders->where(['parent_id' => $path_id]);
        } else {
            $materials->whereNull('path_id');
            $folders->whereNull('parent_id');
        }
        if ($user && $user->role === User::STUDENT_ROLE && $user->group_id) {
            $materials->where(function ($query) use ($user) {
                $query->where(['group_id' => $user->group_id])
                    ->orWhereNull('group_id');
            });
            $folders = $folders->where(function ($query) use ($user) {
                $query->where(['group_id' => $user->group_id])
                    ->orWhereNull('group_id');
            });
        }
        $search = $request->search ?? '';
        if ($search) {
            $materials->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('description', 'LIKE', '%' . $search . '%');
            });
        }
        $materials = $materials->get();
        $folders = $folders->get();
        $folder_id = $request->path_id ?? '';
        if ($folder_id) {
            $folder = Folders::find($folder_id);
            $path_name = $folder->name ?? '';
        } else {
            $path_name = '';
        }

        return view('material.show', [
            'materials' => $materials ?? [],
            'folders' => $folders,
            'search' => $search,
            'path_id' => $folder_id,
            'path_name' => $path_name
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $groups = Groups::all();
        $result_groups = [];
        foreach ($groups as $group) {
            $result_groups[$group->id] = $group->name;
        }

        return view('material.add', [
            'groups' => $groups,
            'path_id' => $request->path_id ?? '',
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function addFolder(Request $request)
    {
        $groups = Groups::all();
        $result_groups = [];
        foreach ($groups as $group) {
            $result_groups[$group->id] = $group->name;
        }

        return view('material.addFolder', [
            'groups' => $groups,
            'path_id' => $request->path_id ?? '',
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $user = Auth::user();
        if (!$user || $user->role != User::ADMIN_ROLE) {
            return redirect()->back()->withException(new AccessDeniedException());
        }
        $validate = Validator::make($request->input(), [
            'name' => ['required', 'string', 'min:1', 'max:255']
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }
        $file_path = '';
        if ($request->file('file') && $request->file('file')->isValid()) {
            $request->file->storeAs('methodical/' . $user->id, $request->file->getClientOriginalName());
            $file_path = 'methodical/' . $user->id . '/' . $request->file->getClientOriginalName();
        }

        MethodicalMaterial::create([
            'name' => $request->name,
            'description' => $request->description ?? '',
            'group_id' => $request->group_id ?? null,
            'path_id' => $request->path_id ?? null,
            'file_path' => $file_path ?? '',
            'user_id' => $user->id,
        ]);

        return redirect('/materials');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function saveFolder(Request $request)
    {
        $user = Auth::user();
        if (!$user || $user->role != User::ADMIN_ROLE) {
            return redirect()->back()->withException(new AccessDeniedException());
        }
        $validate = Validator::make($request->input(), [
            'name' => ['required', 'string', 'min:1', 'max:255']
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }

        Folders::create([
            'name' => $request->name,
            'group_id' => $request->group_id ?? null,
            'parent_id' => $request->path_id ?? null,
        ]);

        return redirect('/materials');
    }

    /**
     * @param int $material_id
     * @return \Illuminate\Http\Response
     */
    public function download(int $material_id)
    {
        $material = MethodicalMaterial::find($material_id);
        $pathToFile = storage_path() . "/app/" . $material->file_path;

        return response()->download($pathToFile);
    }
}
