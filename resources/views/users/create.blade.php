@extends('layouts.master')

@section('title')
    Create Users
@endsection

@section('sitemap')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('users.index')}}">Index</a></li>
    <li class="breadcrumb-item active"><a href="{{route('users.create')}}">Create</a></li>
@endsection
@section('content')

    <div class="container">
        <div class="card border-primary">
            <div class="card-header font-weight-bold bg-primary bg-primary"><h3 class="mb-0">Create User</h3></div>
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

                <form action="{{route('users.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="employee_id">Employee Id</label>
                        <input type="number" class="form-control" id="employee_id" name="employee_id">
                    </div>
                    <div class="form-group">
                        <label for="name">User Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm-password" name="confirm-password">
                    </div>
                    <div class="form-group">
                        <strong>Role:</strong>
                        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-success">Add User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
