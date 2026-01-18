<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $users= User::all();
        $Lastusers= User::latest()->take(5)->get();
        return view('admin.dashboard',[
            "users" => $users,
            "Lastusers"=>$Lastusers,
        ]);
    }
  
}
