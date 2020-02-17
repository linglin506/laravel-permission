<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.dashboard');
    }

    /*
     * 手动给某用户增加角色
     * @return \Illuminate\Http\Response
     */
    public function UserForRole(){
        $user = User::findOrFail(1);
        return $user->syncRoles('Super-Admin');

    }

    /**
     * 后台布局
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function layout()
    {
        return view('home.layout');
    }
}
