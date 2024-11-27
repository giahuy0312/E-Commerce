<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showDasboard(){
        return view('admin.content.thongKe');
    }
    public function showFormLog(){
        return view('admin.admin-log');
    }
    public function checkLog()
    {
        if (Auth::check()){
            return redirect()->route('showDasboard');
        }
        return view('admin.admin-log');
    }

    public function login()
    {
        return view('admin.admin-log');
    }
    public function postLogin(Request $request)
    {
       if (Auth::attempt(['email'=> $request->email,'password'=>$request->password])) {
           return redirect()->route('showDasboard');
       }
       else {
        return redirect()->back()->with('error','Sai tên hoặc mật khẩu');
       }
    }
    
    public function regis(Request $request)
    {
        return view('admin.admin-regis');
    }
    public function postRegis(Request $request)
    {
        $request->merge(['password' => Hash::make($request->password)]);

      User::create($request -> all());
      return view('admin.admin-log');
    }
    public function signout()
    {
        Auth::logout();

        return redirect()->route('showFormLog');
    }
}
