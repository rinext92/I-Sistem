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
        // $list = Role::selectRaw('roles.*, users.*')->leftJoin('users','roles.icNumber', '=', 'users.icNumber')
        //         ->where('roles.role', '!=', '1')->paginate(2);
        //$list = DB::table('users')->simplePaginate(1);
        //return View::make('pages.listStaff')->with('postList', $list);
         // return view('pages.listStaff', ['staff' => $list]);
         //return View::make('pages.listStaff')->with(['staff' => $list]);
        $list = User::where('role', '!=', '1')->paginate(3);
         //$list = DB::table('users')->paginate(15);
         return view('pages.listStaff', ['staff' => $list]);
    }

    public function setting()
    {
        return view('pages.setting');
    }
}
