@extends('layouts.app')
    @section('title')
        registered staff
    @endsection
    @section('content')
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
    @endsection
