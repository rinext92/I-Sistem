<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View,Auth,DB,Redirect,File,Image;
use Input;
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
        $userId = Auth::user()->id;
        $user = Auth::user()->where('id', '=', $userId)->get();
        return  view('pages.profile')->with('userDetails', $user);
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

    public function LevelAccess($id)
    {   
        $user = User::where('id', '=', $id)->get();
        return view('staff.LevelAccess')->with('user', $user);
    }

    public function changeRole($id, Request $request)
    {
        $role = Input::get('selectRole');
        User::where('id', $id)->update(array('role' => $role));
        return redirect('viewStaff');
    }

    public function editProfile($id)
    {   
        $userId = Auth::user()->id;
        $user = Auth::user()->where('id', '=', $userId)->get();
        return view('pages.editProfile')->with('userDetails', $user);
    }

    public function updateProfile(Request $request)
    {

        $usr_id = Auth::user()->id;
        $user =  User::find($usr_id);
        if ($request->hasFile('image')) 
        {   
            
            $usr_img = Auth::user()->img_path;
            if($usr_img == 'default.jpg')
            {
                $imageName = $usr_id.'.'.$request->image->getClientOriginalName();
                $request->image->move(public_path('img/usr_profile'), $imageName);
                $user->img_path = $request->image->getClientOriginalName();
                $user->name = Input::get('t_name');
                $user->email = Input::get('t_email');
                $user->icNumber = Input::get('t_icNumber');
                $user->password = bcrypt(Input::get('t_password'));
                $user->age = Input::get('t_age');
                $user->gender = Input::get('t_gender');
                $user->status = Input::get('t_status');
                $user->address = Input::get('t_address');
                $user->save();
            }
            else
            {   
                $previous_img = $usr_id.'.'.$usr_img;
                File::delete('img/usr_profile/' . $previous_img);
                $imageName = $usr_id.'.'.$request->image->getClientOriginalName();
                $request->image->move(public_path('img/usr_profile'), $imageName);
                $user->img_path = $request->image->getClientOriginalName();
                $user->name = Input::get('t_name');
                $user->email = Input::get('t_email');
                $user->icNumber = Input::get('t_icNumber');
                $user->password = bcrypt(Input::get('t_password'));
                $user->age = Input::get('t_age');
                $user->gender = Input::get('t_gender');
                $user->status = Input::get('t_status');
                $user->address = Input::get('t_address');
                $user->save();
                $img = Image::make('img/usr_profile/'.$imageName);
                $img->resize(128,128);
                $img->save();
                
            }
        }
        return Redirect::to('/profile');
    }
}
