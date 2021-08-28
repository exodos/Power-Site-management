@extends('layouts.master')

@section('title')
    Generators Information
@endsection

@section('sitemap')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('powers.index')}}">Index</a></li>
    <li class="breadcrumb-item active"><a href="#">Create</a></li>
@endsection

@section('content')

    <div class="container">
        <div class="card border-success">
            <div class="card-header font-weight-bold bg-gradient-primary"><h3 class="mb-0">Create Generator</h3></div>
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
                <form action="{{route('powers.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="id">Id</label>
                        <input type="number" class="form-control" id="id" name="id" value="{{request()->old('id')}}">
                    </div>
                    <div class="form-group">
                        <label for="generator_type">Generator Type</label>
                        <select class="form-control form-control-lg mb-3" name="generator_type"
                                id="generator_type">
                            <option value="none" selected disabled hidden>Please Select</option>
                            <option value="Pramac">Pramac</option>
                            <option value="Cummins">Cummins</option>
                            <option value="Lionrock">Lionrock</option>
                            <option value="Meiko">Meiko</option>
                            <option value="Cooltech">Cooltech</option>
                            <option value="Greenpower">Greenpower</option>
                            <option value="Colem">Colem</option>
                            <option value="Tellhow">Tellhow</option>
                            <option value="Johndeere">Johndeere</option>
                            <option value="VM">VM</option>
                            <option value="Perkins">Perkins</option>
                            <option value="Volvo">Volvo</option>
                            <option value="Sidmo">Sidmo</option>
                            <option value="Deutz">Deutz</option>
                            <option value="James Dring">James Dring</option>
                            <option value="Benie">Benie</option>
                            <option value="Iveco">Iveco</option>
                            <option value="Dossan">Dossan</option>
                            <option value="Star power">Star power</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="generator_capacity">Generator Capacity</label>
                        <select class="form-control form-control-lg mb-3" name="generator_capacity"
                                id="generator_capacity">
                            <option value="none" selected disabled hidden>Please Select</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="22">22</option>
                            <option value="25">25</option>
                            <option value="30">30</option>
                            <option value="40">40</option>
                            <option value="50">50</option>
                            <option value="60">60</option>
                            <option value="75">75</option>
                            <option value="100">100</option>
                            <option value="110">110</option>
                            <option value="120">120</option>
                            <option value="125">125</option>
                            <option value="200">200</option>
                            <option value="300">300</option>
                            <option value="400">400</option>
                            <option value="500">500</option>
                            <option value="600">600</option>
                            <option value="800">800</option>
                            <option value="1500">1500</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="engine_model">Engine Model</label>
                        <input type="text" class="form-control" id="engine_model" name="engine_model"
                               value="{{request()->old('engine_model')}}">
                    </div>
                    <div class="form-group">
                        <label for="fuel_tanker_capacity">Fuel Tanker Capacity</label>
                        <input type="number" class="form-control" id="fuel_tanker_capacity"
                               name="fuel_tanker_capacity" step="0.01"
                               value="{{request()->old('fuel_tanker_capacity')}}">
                    </div>
                    <div class="form-group">
                        <label for="alternator_model">Alternator Model</label>
                        <input type="text" class="form-control" id="alternator_model"
                               name="alternator_model" value="{{request()->old('alternator_model')}}">
                    </div>
                    <div class="form-group">
                        <label for="alternator_capacity">Alternator Capacity</label>
                        <input type="number" class="form-control" id="alternator_capacity"
                               name="alternator_capacity" step="0.01" value="{{request()->old('alternator_capacity')}}">
                    </div>
                    <div class="form-group">
                        <label for="controller_mode_model">Controller Mode Model</label>
                        <input type="text" class="form-control" id="controller_mode_model"
                               name="controller_mode_model" value="{{request()->old('controller_mode_model')}}">
                    </div>
                    <div class="form-group">
                        <label for="ats_model">ATS Model</label>
                        <input type="text" class="form-control" id="ats_model"
                               name="ats_model" value="{{request()->old('ats_model')}}">
                    </div>
                    <div class="form-group">
                        <label for="ats_capacity">ATS Capacity</label>
                        <input type="number" class="form-control" id="ats_capacity"
                               name="ats_capacity" step="0.01" value="{{request()->old('ats_capacity')}}">
                    </div>
                    <div class="form-group">
                        <label for="generator_foundation_size">Generator Foundation Size</label>
                        <input type="number" class="form-control" id="generator_foundation_size"
                               name="generator_foundation_size" step="0.01"
                               value="{{request()->old('generator_foundation_size')}}">
                    </div>
                    <div class="form-group">
                        <label for="fuel_tank_foundation_size">Fuel Tank Foundation Size</label>
                        <input type="number" class="form-control" id="fuel_tank_foundation_size"
                               name="fuel_tank_foundation_size" step="0.01"
                               value="{{request()->old('fuel_tank_foundation_size')}}">
                    </div>
                    <div class="form-group">
                        <label for="fuel_tanker_type">Fuel Tank Type</label>
                        <input type="text" class="form-control" id="fuel_tanker_type"
                               name="fuel_tanker_type" value="{{request()->old('fuel_tanker_type')}}">
                    </div>
                    <div class="form-group">
                        <label for="fuel_tank_Qty">Fuel Tank QTY</label>
                        <input type="number" class="form-control" id="fuel_tank_Qty"
                               name="fuel_tank_Qty" value="{{request()->old('fuel_tank_Qty')}}">
                    </div>
                    <div class="form-group">
                        <label for="starter_battery_capacity">Starter Battery Capacity</label>
                        <select class="form-control form-control-lg mb-3" name="starter_battery_capacity"
                                id="starter_battery_capacity">
                            <option value="none" selected disabled hidden>Please Select</option>
                            <option value="65">65</option>
                            <option value="70">70</option>
                            <option value="90">90</option>
                            <option value="120">120</option>
                            <option value="150">150</option>
                            <option value="200">200</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="starter_battery_type">Starter Battery Type</label>
                        <input type="text" class="form-control" id="starter_battery_type" name="starter_battery_type"
                               value="{{request()->old('starter_battery_type')}}">
                    </div>
                    <div class="form-group">
                        <label for="functionality_status">Functionality Type</label>
                        <select class="form-control form-control-lg mb-3" name="functionality_status"
                                id="functionality_status">
                            <option value="none" selected disabled hidden>Please Select</option>
                            <option value="auto">Auto</option>
                            <option value="manual">Manual</option>
                            <option value="faulty">Faulty</option>
                            <option value="damaged">Damaged</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dg_commission_date">DG Commission Date</label>
                        <input type="date" class="form-control" id="dg_commission_date"
                               name="dg_commission_date" value="{{request()->old('dg_commission_date')}}">
                    </div>
                    <div class="form-group">
                        <label for="dg_lld_number">DG LLD Number</label>
                        <input type="number" class="form-control" id="dg_lld_number"
                               name="dg_lld_number" value="{{request()->old('dg_lld_number')}}">
                    </div>
                    <div class="form-group">
                        <label for="grid_power_line_voltage_and_transformer_capacity">Grid Power Line Voltage And
                            Transformer Capacity</label>
                        <select class="form-control form-control-lg mb-3"
                                name="grid_power_line_voltage_and_transformer_capacity"
                                id="grid_power_line_voltage_and_transformer_capacity">
                            <option value="none" selected disabled hidden>Please Select</option>
                            <option value="33kV/50KVA">33kV/50KVA</option>
                            <option value="33KV/25 KVA">33KV/25 KVA</option>
                            <option value="15kV/50KVA">15kV/50KVA</option>
                            <option value="15KV/25 KVA">15KV/25 KVA</option>
                            <option value="15KV/100 KVA"> 15KV/100 KVA</option>
                            <option value="15KV/315 KVA">15KV/315 KVA</option>
                            <option value="15KV/400 KVA">15KV/400 KVA</option>
                            <option value="15KV/630 KVA">15KV/630 KVA</option>
                            <option value="15KV/800 KVA">15KV/800 KVA</option>
                            <option value="15KV/1250 KVA">15KV/1250 KVA</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="transformer_installation_date">Transformer Installation Date</label>
                        <input type="date" class="form-control" id="transformer_installation_date"
                               name="transformer_installation_date"
                               value="{{request()->old('transformer_installation_date')}}">
                    </div>
                    <div class="form-group">
                        <label for="site_id">Sites Id</label>
                        <select class="form-control form-control-lg mb-3" name="site_id"
                                id="site_id">
                            <option value="none" selected disabled hidden>Please Select</option>
                            @foreach(\Illuminate\Support\Facades\DB::table('sites')->where('ps_configuration','!=','Mains Only')->orderBy('id','ASC')->get() as $sites)
                                {{--                            @foreach(\App\Models\Site::all() as $sites)--}}
                                <option value="{{$sites->id}}">{{$sites->id}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="work_order_id">Work Order Id</label>
                        <select class="form-control form-control-lg mb-3" name="work_order_id"
                                id="work_order_id">
                            <option value="none" selected disabled hidden>Please Select</option>
                            @foreach(\App\Models\WorkOrder::whereNotIn('id', function ($query){
                                   $query->select('work_order_id')->from('powers');})->get() as $workOrder)
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
