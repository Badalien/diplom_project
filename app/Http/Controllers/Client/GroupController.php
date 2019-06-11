<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class GroupController extends Controller
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
        return view('group.show');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('group.add');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function detail()
    {
        return view('group.detail');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->back();//todo
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function save()
    {
        return redirect()->back();//todo
    }
}
