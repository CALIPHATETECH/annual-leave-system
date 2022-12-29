
@extends('layouts.app')
    @section('title')
        {{Auth::user()->staffID}} create application
    @endsection
    @section('content')
            <form enctype="multipart/form-data" action="{{route('application.register',[$staff->id])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="date" class="input-group form-control" placeholder="Expected date to leave" value="{{old('start')}}" name="start">
                    </div>
                    <div class="form-group">
                        <input type="date" class="input-group form-control" placeholder="Expected date to resume" value="{{old('end')}}" name="end">
                    </div>
                    <div class="form-group">
                        <select name="leave_id" id="" class="input-group form-control">
                            <option value="">Type Of Leave</option>
                            @foreach(App\Models\Leave::all() as $leave)
                                <option value="{{$leave->id}}">{{$leave->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea name="content" id="" cols="30" rows="10" class="input-group form-control" placeholder="Please describe why you need this leave in few sentences">{{old('content')}}</textarea>
                    </div>
                
                    
                    <button class="btn btn-primary">REGISTER</button>
                </form>
            @endsection