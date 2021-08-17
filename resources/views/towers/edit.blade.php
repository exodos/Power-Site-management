@extends('layouts.master')

@section('title')
    Update Towers
@endsection

@section('sitemap')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('towers.index')}}">Index</a></li>
    <li class="breadcrumb-item active"><a href="#">Update</a></li>
@endsection

@section('content')
    <div class="container">
        <div class="card border-success">
            <div class="card-header font-weight-bold bg-gradient-primary"><h3 class="mb-0">Update Towers</h3></div>
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
                <form action="{{route('towers.update', isset($towers)?$towers->id:'')}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="id">Tower Id</label>
                        <input type="number" class="form-control" id="id"
                               name="id" value="{{$towers->id}}">
                    </div>
                    <div class="form-group">
                        <label for="towers_type">Towers Type</label>
                        <select class="form-control form-control-lg mb-3" name="towers_type"
                                id="towers_type">
                            <option value="none" selected disabled hidden>Please Select</option>
                            <option value="Rooftop">Rooftop</option>
                            <option value="Green field">Green field</option>
                            <option value="Small cell">Small cell</option>
                            <option value="Pole">Pole</option>
                            <option value="3 Leg">3 Leg</option>
                            <option value="4 leg">4 leg</option>
                            <option value="Camoflage">Camoflage</option>
                            <option value="RT">RT</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="towers_height">Towers Height</label>
                        <select class="form-control form-control-lg mb-3" name="towers_height"
                                id="towers_height">
                            <option value="none" selected disabled hidden>Please Select</option>
                            <option value="6">6</option>
                            <option value="16">16</option>
                            <option value="18">18</option>
                            <option value="24">24</option>
                            <option value="30">30</option>
                            <option value="35">35</option>
                            <option value="45">45</option>
                            <option value="60">60</option>
                            <option value="70">70</option>
                            <option value="80">80</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="towers_brand">Towers Brand</label>
                        <input type="text" class="form-control" id="towers_brand"
                               name="towers_brand" value="{{$towers->towers_brand}}">
                    </div>
                    <div class="form-group">
                        <label for="towers_soil_type">Towers Soil Type</label>
                        <input type="text" class="form-control" id="towers_soil_type"
                               name="towers_soil_type" value="{{$towers->towers_soil_type}}">
                    </div>
                    <div class="form-group">
                        <label for="towers_foundation_type">Towers Foundation Type</label>
                        <input type="text" class="form-control" id="towers_foundation_type"
                               name="towers_foundation_type" value="{{$towers->towers_foundation_type}}">
                    </div>
                    <div class="form-group">
                        <label for="towers_design_load_capacity">Towers Design Load Capacity</label>
                        <input type="number" class="form-control" id="towers_design_load_capacity"
                               name="towers_design_load_capacity" step="0.01" value="{{$towers->towers_design_load_capacity}}">
                    </div>
                    <div class="form-group">
                        <label for="towers_sharing_operator">Towers Sharing Operator</label>
                        <input type="text" class="form-control" id="towers_sharing_operator"
                               name="towers_sharing_operator" value="{{$towers->towers_sharing_operator}}">
                    </div>
                    <div class="form-group">
                        <label for="tower_used_load_capacity">Towers Used Load Capacity</label>
                        <input type="number" class="form-control" id="tower_used_load_capacity"
                               name="tower_used_load_capacity" step="0.01" value="{{$towers->tower_used_load_capacity}}">
                    </div>
                    <div class="form-group">
                        <label for="ethio_antenna_weight">Ethio Antenna Weight</label>
                        <input type="number" class="form-control" id="ethio_antenna_weight"
                               name="ethio_antenna_weight" value="{{$towers->ethio_antenna_weight}}">
                    </div>
                    <div class="form-group">
                        <label for="ethio_antenna_height">Ethio Antenna Height</label>
                        <input type="number" class="form-control" id="ethio_antenna_height"
                               name="ethio_antenna_height" value="{{$towers->ethio_antenna_height}}">
                    </div>
                    <div class="form-group">
                        <label for="operator_antenna_height">Operator Antenna Height</label>
                        <input type="number" class="form-control" id="operator_antenna_height"
                               name="operator_antenna_height" value="{{$towers->operator_antenna_height}}">
                    </div>
                    <div class="form-group">
                        <label for="operator_tower_load">Operator Tower Load</label>
                        <input type="number" class="form-control" id="operator_tower_load"
                               name="operator_tower_load" value="{{$towers->operator_tower_load}}">
                    </div>
                    <div class="form-group">
                        <label for="operator_antenna_weight">Operator Antenna Weight</label>
                        <input type="number" class="form-control" id="operator_antenna_weight"
                               name="operator_antenna_weight" value="{{$towers->operator_antenna_weight}}">
                    </div>
                    <div class="form-group">
                        <label for="tower_installation_date">Tower Installation Date</label>
                        <input type="date" class="form-control" id="tower_installation_date"
                               name="tower_installation_date" value="{{$towers->tower_installation_date}}">
                    </div>
                    <div class="form-group">
                        <label for="site_id">Site Id</label>
                        <select class="form-control form-control-lg mb-3" name="site_id"
                                id="site_id">
                            <option value="">Please Select</option>
                            @foreach(\App\Models\Site::all() as $sites)
                                <option value="{{$sites->id}}">{{$sites->id}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="work_order_id">Work Order Id</label>
                        <select class="form-control form-control-lg mb-3" name="work_order_id"
                                id="work_order_id">
                            <option value="none" selected disabled hidden>Please Select</option>
                            @foreach(\App\Models\WorkOrder::all() as $workOrder)
                                <option value="{{$workOrder->id}}">{{$workOrder->id}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary btn-lg">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
