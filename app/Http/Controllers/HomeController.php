<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Service\UserInfoGetter;


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
        $usersList = UserInfoGetter::getUsersList();
        return view('home', compact('usersList'));
    }
    
    public function showUser(Request $request){
        $id = $request->input('id');
        $user = UserInfoGetter::getUserInfo($id);
        return view('user', compact('user'));
    }
}
