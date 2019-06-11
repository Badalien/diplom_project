<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Finder\Exception\AccessDeniedException;

class NewsController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $records = News::where(['active' => true])->limit(100)->get();
        $news = [];
        info(1);
        foreach ($records as $record) {
            $user = User::find($record->user_id);
            $news[] = [
                'info' => $record,
                'user' => $user,
            ];
        }

        return view('news.list', [
            'news' => $news,
        ]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('news.create');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        if (!$user || $user->role != User::ADMIN_ROLE) {
            return redirect()->back()->withException(new AccessDeniedException());
        }
        $validate = Validator::make($request->input(), [
            'subject' => ['required', 'string', 'min:1', 'max:255'],
            'text' => ['required', 'string', 'min:1', 'max:1024'],
            'date_publish' => ['required', 'date_format:"Y.m.d"'],
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }

        News::create([
            'subject' => $request->subject,
            'text' => $request->text,
            'date_publish' => $request->date_publish,
            'active' => $request->is_active ? true : false,
            'user_id' => $user->id,
        ]);

        return redirect('/news');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function detail()
    {
        return view('news.detail');
    }
}
