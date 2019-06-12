<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\SiteConfigs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Finder\Exception\AccessDeniedException;

class PortfolioController extends Controller
{

    /**
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $fio = SiteConfigs::where(['type' => 'portfolio_fio'])->first()->value ?? 'не указано';
        $residence = SiteConfigs::where(['type' => 'portfolio_residence'])->first()->value ?? 'не указано';
        $workplace = SiteConfigs::where(['type' => 'portfolio_workplace'])->first()->value ?? 'не указано';
        $position = SiteConfigs::where(['type' => 'portfolio_position'])->first()->value ?? 'не указано';
        $category = SiteConfigs::where(['type' => 'portfolio_category'])->first()->value ?? 'не указано';
        $load = SiteConfigs::where(['type' => 'portfolio_load'])->first()->value ?? 'не указано';
        $about = SiteConfigs::where(['type' => 'portfolio_about'])->first()->value ?? 'не указано';
        $learning = SiteConfigs::where(['type' => 'portfolio_learning'])->first()->value ?? 'не указано';
        $work = SiteConfigs::where(['type' => 'portfolio_work'])->first()->value ?? 'не указано';

        return view('portfolio.show', [
            'fio' => $fio,
            'residence' => $residence,
            'workplace' => $workplace,
            'position' => $position,
            'category' => $category,
            'load' => $load,
            'about' => $about,
            'learning' => $learning,
            'work' => $work
        ]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $fio = SiteConfigs::where(['type' => 'portfolio_fio'])->first()->value ?? '';
        $residence = SiteConfigs::where(['type' => 'portfolio_residence'])->first()->value ?? '';
        $workplace = SiteConfigs::where(['type' => 'portfolio_workplace'])->first()->value ?? '';
        $position = SiteConfigs::where(['type' => 'portfolio_position'])->first()->value ?? '';
        $category = SiteConfigs::where(['type' => 'portfolio_category'])->first()->value ?? '';
        $load = SiteConfigs::where(['type' => 'portfolio_load'])->first()->value ?? '';
        $about = SiteConfigs::where(['type' => 'portfolio_about'])->first()->value ?? '';
        $learning = SiteConfigs::where(['type' => 'portfolio_learning'])->first()->value ?? '';
        $work = SiteConfigs::where(['type' => 'portfolio_work'])->first()->value ?? '';

        return view('portfolio.edit', [
            'fio' => $fio,
            'residence' => $residence,
            'workplace' => $workplace,
            'position' => $position,
            'category' => $category,
            'load' => $load,
            'about' => $about,
            'learning' => $learning,
            'work' => $work
        ]);
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

        $params = ['portfolio_fio', 'portfolio_residence', 'portfolio_workplace', 'portfolio_position', 'portfolio_category', 'portfolio_load', 'portfolio_about', 'portfolio_learning', 'portfolio_work'];
        foreach ($params as $param) {
            $this->savePortfolioParam($param, $request);
        }

        return redirect('/portfolio');
    }

    /**
     * @param string $param
     * @param Request $request
     */
    private function savePortfolioParam(string $param, Request $request)
    {
        $param_value = $request[$param] ?? '';
        $param_obj = SiteConfigs::where(['type' => $param])->first();
        if ($param_obj) {
            $param_obj->value = $param_value;
            $param_obj->save();
        } else {
            SiteConfigs::create([
                'type' => $param,
                'value' => $param_value
            ]);
        }
    }
}
