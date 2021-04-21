@extends('layouts.master')

@section('title')
    Sites Information
@endsection

@section('sitemap')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('sites.index')}}">Index</a></li>
    <li class="breadcrumb-item active"><a href="#">Create</a></li>
@endsection

@section('content')

    <div class="container">
        <div class="card border-primary">
            <div class="card-header font-weight-bold bg-primary bg-primary"><h3 class="mb-0">Create Sites</h3></div>
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

                <form action="{{route('sites.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="id">Site Id</label>
                        <input type="number" class="form-control" id="id" name="id">
                    </div>
                    <div class="form-group">
                        <label for="sites_name">Sites Name</label>
                        <input type="text" class="form-control" id="sites_name" name="sites_name">
                    </div>
                    <div class="form-group">
                        <label for="sites_latitude">Sites Latitude</label>
                        <input type="number" class="form-control" id="sites_latitude" name="sites_latitude" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="sites_longitude">Sites Longitude</label>
                        <input type="number" class="form-control" id="sites_longitude" name="sites_longitude"
                               step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="sites_region_zone">Sites Region Zone</label>
                        <input type="text" class="form-control" id="sites_region_zone" name="sites_region_zone">
                    </div>
                    <div class="form-group">
                        <label for="sites_political_region">Sites Political Region</label>
                        <input type="text" class="form-control" id="sites_political_region"
                               name="sites_political_region">
                    </div>
                    <div class="form-group">
                        <label for="sites_category">Sites Category</label>
                        <input type="text" class="form-control" id="sites_category" name="sites_category">
                    </div>
                    <div class="form-group">
                        <label for="sites_class">Sites Class</label>
                        <input type="text" class="form-control" id="sites_class" name="sites_class">
                    </div>
                    <div class="form-group">
                        <label for="sites_value">Sites Value</label>
                        <input type="text" class="form-control" id="sites_value" name="sites_value">
                    </div>
                    <div class="form-group">
                        <label for="sites_type">Sites Type</label>
                        <input type="text" class="form-control" id="sites_type" name="sites_type">
                    </div>
                    <div class="form-group">
                        <label for="sites_configuration">Sites Configuration</label>
                        <input type="text" class="form-control" id="sites_configuration" name="sites_configuration">
                    </div>
                    <div class="form-group">
                        <label for="monitoring_system_name">Monitoring System Name</label>
                        <input type="text" class="form-control" id="monitoring_system_name"
                               name="monitoring_system_name">
                    </div>
                    <div class="form-group">
                        <label for="commercial_power_line_voltage">Commercial Power Line Voltage</label>
                        <input type="number" class="form-control" id="commercial_power_line_voltage"
                               name="commercial_power_line_voltage">
                    </div>
                    <div class="form-group">
                        <label for="distance_maintenance_center">Distance From Maintenance Center</label>
                        <input type="number" class="form-control" id="distance_maintenance_center"
                               name="distance_maintenance_center" step="0.01">
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-success">Add Site</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
