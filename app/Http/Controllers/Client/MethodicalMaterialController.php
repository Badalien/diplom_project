<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class MethodicalMaterialController extends Controller
{

    /**
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('material.show');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('material.add');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function detail()
    {
        return view('material.detail');
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
