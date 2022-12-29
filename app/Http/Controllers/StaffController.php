<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function index()
    {
        return view('staff.index');
    }

    public function register(Request $request)
    {

        $request->validate([
            "name" => 'required|string',
            "email" => 'required|email|unique:users',
            "phone" => 'required|unique:users',
            "staffID" => 'required|unique:users',
            "password" => 'required|string'
        ]);
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'staffID'=>$request->staffID,
            'password'=>Hash::make($request->password),
            'role'=>'staff'
            ]);
        return redirect()->route('staff.index');
    }

    public function update(Request $request, $staffId)
    {

        $request->validate([
            "name" => 'required|string',
            "email" => 'required|email|',
            "phone" => 'required|',
            "staffID" => 'required|string',
        ]);

        $staff = User::find($staffId);
        $staff->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'staffID'=>$request->staffID,
            ]);
        if($request->password){
            $staff->update(['password'=>Hash::make($request->password)]);
        }    
        return redirect()->route('staff.index');
    }

    public function delete($staffId)
    {
        $staff = User::find($staffId);
        $staff->delete();
        return redirect()->route('staff.index');
    }
}
