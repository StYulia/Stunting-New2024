<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view("auth.login");
    }

    public function authenticate(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                "password" => 'required'
            ]
        );

        $isLogin = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if ($isLogin) {
            $user = Auth::user();
            if ($user->role == 'admin' || $user->role == 'kader') {
                return redirect()->route('admin.index')->with('success'  , 'success login');
            } else {
                return redirect()->route('index')->with('success' , 'success login');
            }
        } else {
            return redirect()->back()->withErrors('ops please check your credentials');
        }
    }

    public function register()
    {
        return view("auth.register");
    }


    public function registerPost(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'fullname' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'province_id' => 'required|exists:reg_provinces,id',
            'regency_id' => 'required|exists:reg_regencies,id',
            'district_id' => 'required',
            'village_id' => 'required',
            'alamat' => 'required'
        ]);

    
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'alamat' => $request->input('alamat'),
            'role' => 'user',
            'fullname' => $request->input('fullname')
        ]); 

        $userAddress = UserAddress::create([
            'province_id' => $request->input('province_id'),
            'regency_id' => $request->input('regency_id'),
            'village_id' => $request->input('village_id'),
            'district_id' => $request->input('district_id'),
            'user_id' => $user->id,
        ]);
        return redirect()->route('login')->with('success','success registrasi silahkan login');
    }


    public function logout(){
        Auth::logout();
        return redirect()->route('home')->with('success','success logout');
    }

}
