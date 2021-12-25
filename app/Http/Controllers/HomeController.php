<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $breadcrumbs = [
            ['title' => 'Home', 'url' => route('home')],
        ];

        return view('home', [
            'projectCount' => Project::count(),
            'userCount' => User::count(),
            'breadcrumbs' => $breadcrumbs,
        ]);
    }
}
