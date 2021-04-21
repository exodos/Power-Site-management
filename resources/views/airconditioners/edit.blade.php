@extends('layouts.master')

@section('title')
    AirConditioners Information
@endsection

@section('sitemap')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('airconditioners.index')}}">Index</a></li>
    <li class="breadcrumb-item active"><a href="#">Create</a></li>
@endsection

@section('content')

    <div class="container">
        <div class="card border-primary">
            <div class="card-header font-weight-bold bg-primary"><h3 class="mb-0">Update Air Conditioners</h3></div>
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

                <form action="{{route('airconditioners.update', isset($air)?$air->id:'')}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="id">Air Conditioner Id</label>
                        <input type="number" class="form-control" id="id"
                               name="id">
                    </div>
                    <div class="form-group">
                        <label for="air_conditioners_model">Air Conditioner Model</label>
                        <input type="text" class="form-control" id="air_conditioners_model"
                               name="air_conditioners_model">
                    </div>
                    <div class="form-group">
                        <label for="air_conditioners_capacity">Air Conditioner Capacity</label>
                        <input type="number" class="form-control" id="air_conditioners_capacity"
                               name="air_conditioners_capacity" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="site_id">Sites Id</label>
                        <select class="form-control form-control-lg mb-3" name="site_id"
                                id="site_id">
                            <option value="">Please Select</option>
                            @foreach(\App\Models\Site::all() as $site)
                                <option value="{{$site->id}}">{{$site->id}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-success">Update Air Conditioner</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
