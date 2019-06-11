<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class PortfolioController extends Controller
{

    /**
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('portfolio.show');
    }
}
