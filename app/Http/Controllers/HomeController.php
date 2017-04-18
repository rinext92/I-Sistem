<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View,Auth,DB;
use App\Role;
use App\User;
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
        return view('home');
    }

    public function viewProfile()
    {
        return  view('pages.profile');
    }

    public function listOfStaff()
    {  
        $list = User::where('role', '!=', '1')->paginate(3, ['*'], 'staffList');
        $LevelList = DB::table('users')->orderBy('role','asc')->paginate(3, ['*'], 'LevelAccess');
         return view('pages.listStaff')->with('staff', $list)->with('LevelAccess', $LevelList);
    }

    public function setting()
    {
        return view('pages.setting');
    }
}
