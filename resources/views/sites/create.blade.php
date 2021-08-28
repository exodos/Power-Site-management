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
        <div class="card border-success">
            <div class="card-header font-weight-bold bg-gradient-primary bg-success"><h3 class="mb-0">Create Sites</h3></div>
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
                        <input type="number" class="form-control" id="id" name="id" value="{{request()->old('id')}}">
                    </div>
                    <div class="form-group">
                        <label for="sites_name">Sites Name</label>
                        <input type="text" class="form-control" id="sites_name" name="sites_name" value="{{request()->old('sites_name')}}">
                    </div>
                    <div class="form-group">
                        <label for="ps_configuration">Power Source Configuration</label>
                        <select class="form-control form-control-lg mb-3" name="ps_configuration"
                                id="ps_configuration">
                            <option value="none" selected disabled hidden>Please Select</option>
                            <option value="Mains Only">Mains Only</option>
                            <option value="Mains + DG">Mains + DG</option>
                            <option value="Dual DG">Dual DG</option>
                            <option value="DG + BB">DG + BB</option>
                            <option value="Solar Hybrid">Solar Hybrid</option>
                            <option value="Pure solar">Pure solar</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="monitoring_status">Monitoring Status</label>
                        <select class="form-control form-control-lg mb-3" name="monitoring_status"
                                id="monitoring_status">
                            <option value="none" selected disabled hidden>Please Select</option>
                            <option value="Monitored">Monitored</option>
                            <option value="Not Monitored">Not Monitored</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sites_latitude">Sites Latitude</label>
                        <input type="number" class="form-control" id="sites_latitude" name="sites_latitude" step="0.000001" value="{{request()->old('sites_latitude')}}">
                    </div>
                    <div class="form-group">
                        <label for="sites_longitude">Sites Longitude</label>
                        <input type="number" class="form-control" id="sites_longitude" name="sites_longitude"
                               step="0.000001" value="{{request()->old('sites_longitude')}}">
                    </div>
                    <div class="form-group">
                        <label for="sites_region_zone">Sites Region Zone</label>
                        <select class="form-control form-control-lg mb-3" name="sites_region_zone"
                                id="sites_region_zone">
                            <option value="none" selected disabled hidden>Please Select</option>
                            <option value="NWR">NWR</option>
                            <option value="SWWR">SWWR</option>
                            <option value="NEER">NEER</option>
                            <option value="CNR">CNR</option>
                            <option value="CWR">CWR</option>
                            <option value="NER">NER</option>
                            <option value="CER">CER</option>
                            <option value="ER">ER</option>
                            <option value="EER">EER</option>
                            <option value="SSWR">SSWR</option>
                            <option value="NNWR">NNWR</option>
                            <option value="SR">SR</option>
                            <option value="SER">SER</option>
                            <option value="WR">WR</option>
                            <option value="SWR">SWR</option>
                            <option value="WWR">WWR</option>
                            <option value="NR">NR</option>
                            <option value="CAAZ">CAAZ</option>
                            <option value="WAAZ">WAAZ</option>
                            <option value="SWAAZ">SWAAZ</option>
                            <option value="NAAZ">NAAZ</option>
                            <option value="EAAZ">EAAZ</option>
                            <option value="SAAZ">SAAZ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sites_political_region">Sites Political Region</label>
                        <select class="form-control form-control-lg mb-3" name="sites_political_region"
                                id="sites_political_region">
                            <option value="none" selected disabled hidden>Please Select</option>
                            <option value="Tigray">Tigray</option>
                            <option value="Amhara">Amhara</option>
                            <option value="Oromia">Oromia</option>
                            <option value="SNNP">SNNP</option>
                            <option value="Sidama">Sidama</option>
                            <option value="Harari">Harari</option>
                            <option value="Diredawa">Diredawa</option>
                            <option value="AA">AA</option>
                            <option value="Benishangul">Benishangul</option>
                            <option value="Somali">Somali</option>
                            <option value="Gambela">Gambela</option>
                            <option value="Afar">Afar</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sites_location">Sites Location</label>
                        <input type="text" class="form-control" id="sites_location" name="sites_location" value="{{request()->old('sites_location')}}">
                    </div>
                    <div class="form-group">
                        <label for="sites_class">Sites Class</label>
                        <select class="form-control form-control-lg mb-3" name="sites_class"
                                id="sites_class">
                            <option value="none" selected disabled hidden>Please Select</option>
                            <option value="Class 1">Class 1</option>
                            <option value="Class 2">Class 2</option>
                            <option value="Class 3">Class 3</option>
                            <option value="Class 4">Class 4</option>
                            <option value="Class 5">Class 5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sites_value">Sites Value</label>
                        <input type="text" class="form-control" id="sites_value" name="sites_value" value="{{request()->old('sites_value')}}">
                    </div>
                    <div class="form-group">
                        <label for="sites_type">Sites Type</label>
                        <select class="form-control form-control-lg mb-3" name="sites_type"
                                id="sites_type">
                            <option value="none" selected disabled hidden>Please Select</option>
                            <option value="In door BTS">In door BTS</option>
                            <option value="Out door BTS 2">Out door BTS</option>
                            <option value="Indoor non-BTS">Indoor non-BTS</option>
                            <option value="Out door non-BTS">Out door non-BTS</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="maintenance_center">Maintenance Center</label>
                        <input type="text" class="form-control" id="maintenance_center" name="maintenance_center" value="{{request()->old('maintenance_center')}}">
                    </div>
                    <div class="form-group">
                        <label for="distance_mc">Distance From MC</label>
                        <input type="number" class="form-control" id="distance_mc"
                               name="distance_mc" step="0.01" value="{{request()->old('distance_mc')}}">
                    </div>
                    <div class="form-group">
                        <label for="list_of_ne">List Of NE</label>
                        <input type="text" class="form-control" id="list_of_ne"
                               name="list_of_ne" value="{{request()->old('list_of_ne')}}">
                    </div>
                    <div class="form-group">
                        <label for="number_of_towers">Number Of Towers</label>
                        <input type="number" class="form-control" id="number_of_towers"
                               name="number_of_towers" value="{{request()->old('number_of_towers')}}">
                    </div>
                    <div class="form-group">
                        <label for="number_of_generator">Number Of Generator</label>
                        <input type="number" class="form-control" id="number_of_generator"
                               name="number_of_generator" value="{{request()->old('number_of_generator')}}">
                    </div>
                    <div class="form-group">
                        <label for="number_of_airconditioners">Number Of Air Conditioners</label>
                        <input type="number" class="form-control" id="number_of_airconditioners"
                               name="number_of_airconditioners" value="{{request()->old('number_of_airconditioners')}}">
                    </div>
                    <div class="form-group">
                        <label for="number_of_rectifiers">Number Of Rectifiers</label>
                        <input type="number" class="form-control" id="number_of_rectifiers"
                               name="number_of_rectifiers" value="{{request()->old('number_of_rectifiers')}}">
                    </div>
                    <div class="form-group">
                        <label for="number_of_solar_system">Number Of Solar System</label>
                        <input type="number" class="form-control" id="number_of_solar_system"
                               name="number_of_solar_system" value="{{request()->old('number_of_solar_system')}}">
                    </div>
                    <div class="form-group">
                        <label for="number_of_down_links">Number Of Down Links</label>
                        <input type="number" class="form-control" id="number_of_down_links"
                               name="number_of_down_links" value="{{request()->old('number_of_down_links')}}">
                    </div>
{{--                    <div class="form-group">--}}
{{--                        <label for="work_order_id">Work Order Id</label>--}}
{{--                        <select class="form-control form-control-lg mb-3" name="work_order_id"--}}
{{--                                id="work_order_id">--}}
{{--                            <option value="none" selected disabled hidden>Please Select</option>--}}
{{--                            @foreach(\App\Models\WorkOrder::all() as $workOrder)--}}
{{--                                <option value="{{$workOrder->id}}">{{$workOrder->id}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}

                    <div class="form-group">
                        <label for="work_order_id">Work Order Id</label>
                        <select class="form-control form-control-lg mb-3" name="work_order_id"
                                id="work_order_id">
                            <option value="none" selected disabled hidden>Please Select</option>
                            @foreach(\App\Models\WorkOrder::whereNotIn('id', function ($query){
                                   $query->select('work_order_id')->from('sites');})->get() as $workOrder)
                                <option value="{{$workOrder->id}}">{{$workOrder->id}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary btn-lg">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
