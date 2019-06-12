<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
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
        $search = $request->search ?? '';
        if ($search) {
            $materials = MethodicalMaterial::where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('description', 'LIKE', '%' . $search . '%')
                ->get();
        } else {
            $materials = MethodicalMaterial::all();
        }

        return view('material.show', [
            'materials' => $materials
        ]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('material.add');
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
            'file_path' => $file_path ?? '',
            'user_id' => $user->id,
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
