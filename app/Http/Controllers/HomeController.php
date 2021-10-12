<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;

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
        return view('home');
    }
    /**
     *optimize the app.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function optimize(){
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('optimize');
        return "App optimized";

    }
    /**
     * Show the application login form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showloginform()
    {
        return redirect('login');
    }

     /**
     * send mail to user.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function mail()
    {
        return view('mailUsers');
    }

    /**
     * Show the setting page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function setting()
    {
        return view('setting');
    }

    /**
     * Search.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function search()
    {
        return view('search');
    }
}
