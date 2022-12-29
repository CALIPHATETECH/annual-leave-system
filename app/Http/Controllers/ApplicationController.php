<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Application;

class ApplicationController extends Controller
{

    public function index()
    {
        return view('application.index');
    }

    public function create($staffId)
    {
        return view('application.create',['staff'=>User::find($staffId)]);
    }

    public function register(Request $request, $staffId)
    {
        
        $request->validate([
            "start" => 'required',
            "end" => 'required',
            "leave_id" => 'required',
            "content" => 'required|string'
        ]);
        $staff = User::find($staffId);
        $staff->applications()->create([
            'start'=>$request->start,
            'end'=>$request->end,
            'leave_id'=>$request->leave_id,
            'content'=>$request->content,
            ]);
        return redirect()->route('dashboard');
    }

    public function update(Request $request, $applicationId, $status)
    {
        $request->validate(['coment'=>'required']);
        $application = Application::find($applicationId);
    
        $application->update(['comment'=>$request->coment,'status'=>$status]);
        return redirect()->route('application.index');
    }

    public function response($applicationId, $status)
    {
        
        $application = Application::find($applicationId);
    
        $application->update(['staff_response'=>$status]);
        return redirect()->route('dashboard');
    }
}
