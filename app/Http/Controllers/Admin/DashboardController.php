<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class DashboardController extends Controller
{
    public function addNewUser(){

        return view('admin.register');

    }

    public function registered()
    {

    	$users = User::all();

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
                    'phone' => 'required|string|max:10|min:10',
                    'email' => 'required|string|email|max:255|unique:users',
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
        $data = $request->only('usertype','fname','lname','email','phone');        
    	$users->update($data);

    	return redirect('/role-register')->with('status','data is updated'); 
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
                    'phone' => 'required|string|max:10|min:10',
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
            $user->phone = $imageName;
            $user->usertype = 'employee';
            $user->password = bcrypt($request->password);
            $user->save();

            return redirect('/role-register')->with('status','Employee add Susscessfully'); 

        }catch(\Exception $e){
           return $e->getMessage();  
        }

    }
}
