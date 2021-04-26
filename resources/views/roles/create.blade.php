@extends('layouts.master')

@section('title')
    Roles Information
@endsection

@section('sitemap')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('roles.index')}}">Roles</a></li>
    <li class="breadcrumb-item active"><a href="">Create</a></li>
@endsection

@section('content')
    <div class="container">
        <div class="card border-primary">
            <div class="card-header font-weight-bold bg-primary bg-primary"><h3 class="mb-0">Create New Roles</h3></div>
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
                <form action="{{route('roles.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <strong>Permission:</strong>
                        <br/>
                        @foreach($permission as $value)
                            <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                {{ $value->name }}</label>
                            <br/>
                        @endforeach
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-success">Add Role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
