<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function index(){
        $stuntingCounts = DB::table('cf_user')
        ->join('users', 'cf_user.user_id', '=', 'users.id')
        ->join('user_address', 'users.id', '=', 'user_address.user_id')
        ->join('reg_villages' , 'reg_villages.id', 'user_address.village_id')
        ->select('reg_villages.name', DB::raw('count(*) as stunting_count'))
        ->whereBetween('cf_user.cf', [0.61, 1])
        ->groupBy('user_address.village_id')
        ->get();
        return view("admin.index" , compact('stuntingCounts'));
    }
}
