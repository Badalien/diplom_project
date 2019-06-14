<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Finder\Exception\AccessDeniedException;

class TaskController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            $tasks = [];
        } elseif ($user->role == User::ADMIN_ROLE) {
            $tasks = Tasks::all();
        } elseif ($user->role == User::STUDENT_ROLE) {
            $tasks = Tasks::where(['user_id' => $user->id])->get();
        }
        $result_tasks = [];
        foreach ($tasks as $task) {
            $student = User::find($task->user_id);
            $result_tasks[] = [
                'info' => $task,
                'student' => $student,
            ];
        }

        return view('task.show', [
            'tasks' => $result_tasks ?? []
        ]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('task.add');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function estimate($task_id)
    {
        $user = Auth::user();
        if (!$user || $user->role != User::ADMIN_ROLE) {
            return redirect()->back()->withException(new AccessDeniedException());
        }
        $task = Tasks::find($task_id);
        $student = User::find($task->user_id);

        return view('task.estimate', [
            'task' => $task,
            'student' => $student,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $user = Auth::user();
        $validate = Validator::make($request->input(), [
            'description' => ['required', 'string', 'min:1', 'max:255']
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }
        $file_path = '';
        if ($request->file('file') && $request->file('file')->isValid()) {
            $request->file->storeAs('tasks/' . $user->id, $request->file->getClientOriginalName());
            $file_path = 'tasks/' . $user->id . '/' . $request->file->getClientOriginalName();
        }

        Tasks::create([
            'status' => 'active',
            'description' => $request->description ?? '',
            'file_path' => $file_path ?? '',
            'user_id' => $user->id,
            'estimate' => 0,
        ]);

        return redirect('/tasks');
    }

    /**
     * @param int $task_id
     * @return \Illuminate\Http\Response
     */
    public function download(int $task_id)
    {
        $task = Tasks::find($task_id);
        $pathToFile = storage_path() . "/app/" . $task->file_path;

        return response()->download($pathToFile);
    }

    /**
     * @param Request $request
     * @param int $task_id
     * @return \Illuminate\Http\Response
     */
    public function saveEstimate(Request $request, int $task_id)
    {
        $validate = Validator::make($request->input(), [
            'estimate' => ['required', 'min:0', 'max:99.99']
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }
        $task = Tasks::find($task_id);
        $task->estimate = $request->estimate ?? 0;
        $task->description_estimate = $request->description_estimate ?? '';
        $task->save();

        return redirect('/tasks');
    }
}
