<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Helper;

class DashboardController extends Controller
{
    public function index(){
        $total_employee = $this->getTotalEmployee();
        $today_employee = $this->getTodayEmployee();
        $data = array('total_employee' => $total_employee,'today_employee' => $today_employee);
        return view('admin.dashboard')->with($data);

    }
    public function addNewUser(){

        return view('admin.register');

    }

    public function registered()
    {

    	$users = User::all()->where('usertype','employee');

    	return view('admin.user')->with('users',$users);

    }
    // here we create fuction for edit users
    public function registeredit(Request $request, $id)
    {
    	$users = User::findOrFail($id);
    	return view('admin.register-edit')->with('users',$users);
    }

    // here we create function for update button
    public function registerupdate(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [ 
                    'fname' => 'required|string|min:4|max:255',                    
                    'lname' => 'required|string|min:4|max:255',  
                     'phone' => 'required|min:10|numeric',
                ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

            //profile image upload
            $imageName = null;
            if($request->hasFile('profile'))
            {
                $imageName = time().'.'.$request->profile->getClientOriginalExtension();
                $request->profile->move(public_path('image'), $imageName);
            }

    	$users = User::find($id);
        $data = $request->only('usertype','fname','lname','email','phone','address');        
    	$users->update($data);

    	return redirect('/role-register')->with('status','Employee data updated!'); 
    }
    //delete function
    public function registerdelete($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect('/role-register')->with('status','data deleted');

    }

    // Add New
    public function addUser(Request $request )
    {

        $validator = Validator::make($request->all(),

                [ 
                    'fname' => 'required|string|min:4|max:255',                    
                    'phone' => 'required|min:10|numeric',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:8',
                    'password_confirmation' => 'required|same:password', 
                    'profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
                ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {

            //profile image upload
            $imageName = null;
            if($request->hasFile('profile'))
            {
                $imageName = time().'.'.$request->profile->getClientOriginalExtension();
                $request->profile->move(public_path('image'), $imageName);
            }
            $user = new User();
            $user->name = $request->fname;
            $user->fname = $request->fname;
            $user->lname = $request->lname;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->profile = $imageName;
            $user->usertype = 'employee';
            $user->password = bcrypt($request->password);
            $user->save();

            return redirect('/role-register')->with('status','Employee add Susscessfully'); 

        }catch(\Exception $e){
           return $e->getMessage();  
        }

    }

    function getTotalEmployee(){
      return  User::where('usertype','employee')->get()->count();
    }

    function getTodayEmployee(){
      return  User::whereDate('created_at','=',date('Y-m-d'))->get()->count();
    }

}
