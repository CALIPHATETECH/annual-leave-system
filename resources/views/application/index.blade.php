@extends('layouts.app')
    @section('title')
        registered staff
    @endsection
    @section('content')
    <table class="table" style="color: black;">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Leaving At</th>
                <th>Resume At</th>
                <th>ABOUT LEAVE</th>
                <th>STAFF ID</th>
                <th>STAFF RESPONSE</th>
                <th><button data-toggle="modal" data-target="#addStaff" class="btn btn-primary"><b>+ Staff</b></button></th>
            </tr>
            @include('staff.create')
        </thead>
        <tbody>
            @foreach(App\Models\Application::all() as $application)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$application->start}}</td>
                    <td>{{$application->end}}</a></td>
                    <td>{{$application->content}}</a></td>
                    <td>
                    @if($application->status == 'review')
                        <button class="btn btn-warning" data-toggle="modal" data-target="#approve_{{$application->id}}">Approve</button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#reject_{{$application->id}}">Reject</button>
                    @endif
                    </td>
                    @include('application.reject')
                    @include('application.approve')
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
