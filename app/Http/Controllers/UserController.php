<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\Village;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function index(){
        return view("welcome");
    }

    public function profile(){
        $user = auth()->user();
        $user = User::where("id", $user->id)->with('address' , 'address.province' , 'address.regency' , 'address.district' , 'address.village')->first();
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();

        return view("profile" , compact("user" , 'provinces' , 'regencies' , 'villages' , 'districts'));
    }

    public function update(Request $request ){
        $request->validate(
            [
                'username' => 'required',
                'fullname' => 'required',
                'email' => 'required',
                'regency_id' => 'required',
                'province_id' => 'required',
                'district_id' => 'required',
                'village_id' => 'required',
                'alamat' =>'required'
            ]
        );

        $userId = auth()->user()->id;
        User::where('id', $userId)->update([
            'name' =>  $request->username,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'alamat' => $request->alamat
        ]);


        UserAddress::where('user_id', $userId)->update([
            'regency_id' => $request->regency_id,
            'province_id' => $request->province_id,
            'district_id' => $request->district_id,
            'village_id' => $request->village_id,
        ]);

        return redirect()->back()->with('success','berhasil update data profile');

    }
    
}
