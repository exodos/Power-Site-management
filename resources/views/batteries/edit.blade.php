@extends('layouts.master')

@section('title')
    Batteries Information
@endsection

@section('sitemap')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('batteries.index')}}">Index</a></li>
    <li class="breadcrumb-item active"><a href="#">Update</a></li>
@endsection

@section('content')

    <div class="container">
        <div class="card border-primary">
            <div class="card-header font-weight-bold bg-primary"><h3 class="mb-0">Update Battery</h3></div>
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

                <form action="{{route('batteries.update', isset($battery)?$battery->id:'')}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="id">Battery Id</label>
                        <input type="number" class="form-control" id="id"
                               name="id">
                    </div>
                    <div class="form-group">
                        <label for="batteries_model">Battery Model</label>
                        <input type="text" class="form-control" id="batteries_model"
                               name="batteries_model">
                    </div>
                    <div class="form-group">
                        <label for="number_of_batteries_group">Number Of Batteries Group</label>
                        <input type="number" class="form-control" id="number_of_batteries_group"
                               name="number_of_batteries_group">
                    </div>
                    <div class="form-group">
                        <label for="batteries_capacity">Batteries Capacity</label>
                        <input type="number" class="form-control" id="batteries_capacity"
                               name="batteries_capacity" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="site_id">Sites Id</label>
                        <select class="form-control form-control-lg mb-3" name="site_id"
                                id="site_id">
                            <option value="">Please Select</option>
                            @foreach(\App\Models\Site::all() as $sites)
                                <option value="{{$sites->id}}">{{$sites->id}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-success">Update Battery</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
