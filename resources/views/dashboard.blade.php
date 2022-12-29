@extends('layouts.app')

@section('title')
    dashboard
@endsection
@section('content')

    @if(Auth::user()->role == 'staff')
      
            @foreach(Auth::user()->applications->where('staff_response', '!=', 'resume') as $application)
            @if($application->staff_responnse == null || $application->staff_responnse == 'accept')
            <div class="col-md-6">
                <div class="card shadow p-2">
                    <h5>Your {{$application->leave->name}} as been recieved and <b>{{$application->status == 'review' ? 'its on review by the management' : 'has been approved'}}<b></h5>
                    <p>For: {{$application->content}}</p>
                    @if($application->staff_response == null)
                        <a href="{{route('application.response',[$application->id, 'accept'])}}" ><button class="btn btn-success">I am Leaving</button></a> 
                        <a href="{{route('application.response',[$application->id, 'reject'])}}" ><button class="btn btn-info">I am no going again</button></a>
                    @endif
                    @if($application->status == 'review')
                    <p>Pls be checking this page from now to {{$application->end}} for the decision make by the management</p>    
                    @endif
                    @if($application->staff_response == 'accept')
                    <a href="{{route('application.response',[$application->id, 'resume'])}}" ><button class="btn btn-success">I have resume to office</button></a> 
                    @endif
                </div>
            </div>
            @endif
            @endforeach
      <br>
          <div class="alert alert-success"><h4>Hi {{Auth::user()->name}}, You have no any
           pending leave application , but you can apply by clicking this button
            <a href="{{route('application.create',[Auth::user()->id])}}" class="btn btn-info">Apply for for a leave now</a></h4></div>
      
    @else
    <table class="table" style="color: black;">
        <thead>
            <tr>
                <th>S/N</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>STAFF ID</th>
                <th>PHONE</th>
                <th><button data-toggle="modal" data-target="#addStaff" class="btn btn-primary"><b>+ Staff</b></button></th>
            </tr>
            @include('staff.create')
        </thead>
        <tbody>
            @foreach(App\Models\User::where('role','staff')->get() as $staff)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$staff->name}}</td>
                    <td>{{$staff->email}}</a></td>
                    <td>{{$staff->staffID}}</a></td>
                    <td>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$staff->id}}">Edit</button>
                        <a href="{{route('staff.delete',[$staff->id])}}" onclick="return confirm('Are you sure, you want to delete this staff?')"><button class="btn btn-danger">Delete</button></a>
                    </td>
                    @include('staff.edit')
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
            
@endsection