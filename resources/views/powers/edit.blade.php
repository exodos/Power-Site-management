@extends('layouts.master')

@section('title')
    Powers Information
@endsection

@section('sitemap')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('powers.index')}}">Index</a></li>
    <li class="breadcrumb-item active"><a href="#">Update</a></li>
@endsection

@section('content')

    <div class="container">
        <div class="card border-primary">
            <div class="card-header font-weight-bold bg-primary"><h3 class="mb-0">Update Power</h3></div>
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

                <form action="{{route('powers.update', isset($powers)?$powers->id:'')}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="id">Power Id</label>
                        <input type="number" class="form-control" id="id"
                               name="id">
                    </div>
                    <div class="form-group">
                        <label for="powers_type">Power Type</label>
                        <input type="text" class="form-control" id="powers_type"
                               name="powers_type">
                    </div>
                    <div class="form-group">
                        <label for="dg_model">Dg Model</label>
                        <input type="text" class="form-control" id="dg_model"
                               name="dg_model">
                    </div>
                    <div class="form-group">
                        <label for="dg_capacity">Dg Capacity</label>
                        <input type="number" class="form-control" id="dg_capacity"
                               name="dg_capacity" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="fuel_tanker_capacity">Fuel Tanker Capacity</label>
                        <input type="number" class="form-control" id="fuel_tanker_capacity"
                               name="fuel_tanker_capacity" step="0.01">
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
                        <button class="btn btn-success">Update Power</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
