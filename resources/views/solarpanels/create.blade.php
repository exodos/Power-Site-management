@extends('layouts.master')

@section('title')
    Solar Panels Information
@endsection

@section('sitemap')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('solarpanels.index')}}">Index</a></li>
    <li class="breadcrumb-item active"><a href="#">Create</a></li>
@endsection

@section('content')

    <div class="container">
        <div class="card border-success">
            <div class="card-header font-weight-bold bg-gradient-primary"><h3 class="mb-0">Create Solar Panels</h3>
            </div>
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
                <form action="{{route('solarpanels.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="id">Id</label>
                        <input type="number" class="form-control" id="id" name="id">
                    </div>
                    <div class="form-group">
                        <label for="number_solar_system">Number Of Solar System</label>
                        <input type="number" class="form-control" id="number_solar_system"
                               name="number_solar_system">
                    </div>

                    <div class="form-group">
                        <label for="solar_panel_type">Solar Panel Type</label>
                        <input type="text" class="form-control" id="solar_panel_type"
                               name="solar_panel_type">
                    </div>
                    <div class="form-group">
                        <label for="solar_panels_module_capacity">Solar Panels Module Capacity</label>
                        <input type="number" class="form-control" id="solar_panels_module_capacity"
                               name="solar_panels_module_capacity" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="number_of_arrays">Number Of Arrays</label>
                        <input type="number" class="form-control" id="number_of_arrays"
                               name="number_of_arrays">
                    </div>
                    <div class="form-group">
                        <label for="solar_controller_type">Solar Controller Type</label>
                        <input type="text" class="form-control" id="solar_controller_type"
                               name="solar_controller_type">
                    </div>
                    <div class="form-group">
                        <label for="regulator_capacity">Regulator Capacity</label>
                        <input type="number" class="form-control" id="regulator_capacity"
                               name="regulator_capacity" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="solar_regulator_Qty">Solar Regulator Capacity</label>
                        <input type="number" class="form-control" id="solar_regulator_Qty"
                               name="solar_regulator_Qty" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="number_of_structure_group">Number Of Structure Group</label>
                        <input type="number" class="form-control" id="number_of_structure_group"
                               name="number_of_structure_group" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="solar_structure_front_height">Solar Structure Front Height</label>
                        <input type="number" class="form-control" id="solar_structure_front_height"
                               name="solar_structure_front_height" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="solar_structure_rear_height">Solar Structure Rear Height</label>
                        <input type="number" class="form-control" id="solar_structure_rear_height"
                               name="solar_structure_rear_height" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="commission_date">Commission Date</label>
                        <input type="date" class="form-control" id="commission_date"
                               name="commission_date">
                    </div>
                    <div class="form-group">
                        <label for="site_id">Site Id</label>
                        <select class="form-control form-control-lg mb-3" name="site_id"
                                id="site_id">
                            <option value="none" selected disabled hidden>Please Select</option>
                            @foreach(\Illuminate\Support\Facades\DB::table('sites')->where('ps_configuration','=','Solar Hybrid')->orWhere('ps_configuration','=','Pure Solar')->orderBy('id','ASC')->get() as $sites)
                                <option value="{{$sites->id}}">{{$sites->id}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
