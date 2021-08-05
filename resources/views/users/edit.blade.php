@extends('layouts.master')

@section('title')
    AirConditioners Information
@endsection

@section('sitemap')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('users.index')}}">Index</a></li>
    <li class="breadcrumb-item active"><a href="#">Edit</a></li>
@endsection

@section('content')
    <div class="container">
        <div class="text-right">
            <a href="{{route('users.index')}}" class="btn btn-outline-info btn-lg nav-item mb-2"><i
                    class="fas fa-caret-left"></i>
                Back</a>
        </div>
        <div class="card border-success">
            <div class="card-header bg-success font-weight-bold bg-gradient-primary"><h3 class="mb-0">Edit User</h3></div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-group">
                            @foreach($errors->all() as $error)
                                <li class="list-group-item text-danger">
                                    {{$error}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('users.update', isset($user)?$user->id:'')}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="employee_id">Employee Id</label>
                        <input type="number" class="form-control" id="employee_id"
                               name="employee_id" value="{{$user->employee_id}}">
                    </div>
                    <div class="form-group">
                        <label for="name">User Name</label>
                        <input type="text" class="form-control" id="name" value="{{$user->name}}"
                               name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email"
                               name="email" value="{{$user->email}}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password"
                               name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirm password</label>
                        <input type="password" class="form-control" id="confirm-password"
                               name="confirm-password" placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <strong>Role:</strong>
                        {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary btn-lg">Update User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
