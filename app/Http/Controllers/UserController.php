<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function index(){
        $users= User::all();
        $Lastusers= User::latest()->take(5)->get();
        return view('admin.users',
        [
            "users"=>$users,
            "Lastusers"=>$Lastusers

        ]
    );
    }
    function destroy($id){
        $user= User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users')->with('success','User deleted successfully');
    }
    function create(){
        return view('Admin.users.create');
    }
    function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,user',
            'status' => 'required|in:active,blocked',
        ]);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'role'=>$request->role,
            'status'=>$request->status,

        ]);
        return redirect()->route('admin.users')->with('success','User created successfully');

    }

    function edit($id){
        $user=User::findOrFail($id);
        return view('Admin.users.edit',[
            'user'=>$user,
        ]);

    }
    function update(Request $request,$id){
        $validated=$request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'role' => 'required|in:admin,user',
            'status' => 'required|in:active,blocked',
            'password' => 'nullable|string|min:8|confirmed'
        ]);
       
        $user=User::findOrFail($id);
        $updateData=[
             'name'=>$request->name,
            'email'=>$request->email,
            'role'=>$request->role,
            'status'=>$request->status,
        ];
        // لو الباسورد متعباش هسيبها زي ما هي
         if ($request->filled('password')) {
          $updateData['password'] = Hash::make($request->password);
        }

        $user->update($updateData);
        return redirect()->route('admin.users')->with('success','User updated successfully');
    }
}
