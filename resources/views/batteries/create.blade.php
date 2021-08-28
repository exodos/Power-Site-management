@extends('layouts.master')

@section('title')
    Batteries Information
@endsection

@section('sitemap')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('batteries.index')}}">Index</a></li>
    <li class="breadcrumb-item active"><a href="#">Create</a></li>
@endsection

@section('content')

    <div class="container">
        <div class="card border-success">
            <div class="card-header font-weight-bold bg-gradient-primary"><h3 class="mb-0">Create Batteries</h3></div>
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
                <form action="{{route('batteries.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="id">Id</label>
                        <input type="number" class="form-control" id="id" name="id" value="{{request()->old('id')}}">
                    </div>
                    <div class="form-group">
                        <label for="batteries_type">Battery Type</label>
                        <input type="text" class="form-control" id="batteries_type" name="batteries_type" value="{{request()->old('batteries_type')}}">
                    </div>
                    <div class="form-group">
                        <label for="batteries_model">Battery Model</label>
                        <input type="text" class="form-control" id="batteries_model" name="batteries_model" value="{{request()->old('batteries_model')}}">
                    </div>
                    <div class="form-group">
                        <label for="batteries_voltage">Battery Voltage</label>
                        <select class="form-control form-control-lg mb-3" name="batteries_voltage"
                                id="batteries_voltage">
                            <option value="none" selected disabled hidden>Please Select</option>
                            <option value="2">2</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="batteries_capacity">Battery Capacity</label>
                        <select class="form-control form-control-lg mb-3" name="batteries_capacity"
                                id="batteries_capacity">
                            <option value="none" selected disabled hidden>Please Select</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="150">150</option>
                            <option value="200">200</option>
                            <option value="250">250</option>
                            <option value="300">300</option>
                            <option value="350">350</option>
                            <option value="400">400</option>
                            <option value="500">500</option>
                            <option value="550">550</option>
                            <option value="600">600</option>
                            <option value="650">650</option>
                            <option value="700">700</option>
                            <option value="750">750</option>
                            <option value="800">800</option>
                            <option value="850">850</option>
                            <option value="900">900</option>
                            <option value="950">950</option>
                            <option value="1000">1000</option>
                            <option value="1050">1050</option>
                            <option value="1100">1100</option>
                            <option value="1150">1150</option>
                            <option value="1200">1200</option>
                            <option value="1250">1250</option>
                            <option value="1300">1300</option>
                            <option value="1350">1350</option>
                            <option value="1400">1400</option>
                            <option value="1450">1450</option>
                            <option value="1500">1500</option>
                            <option value="1550">1550</option>
                            <option value="1600">1600</option>
                            <option value="1650">1650</option>
                            <option value="1700">1700</option>
                            <option value="1750">1750</option>
                            <option value="1800">1850</option>
                            <option value="1900">1900</option>
                            <option value="1950">1950</option>
                            <option value="2000">2000</option>
                            <option value="2000">2000</option>
                            <option value="2050">2050</option>
                            <option value="2100">2100</option>
                            <option value="2150">2150</option>
                            <option value="2200">2200</option>
                            <option value="2250">2250</option>
                            <option value="2300">2300</option>
                            <option value="2350">2350</option>
                            <option value="2400">2400</option>
                            <option value="2450">2450</option>
                            <option value="2500">2500</option>
                            <option value="2550">2550</option>
                            <option value="2600">2600</option>
                            <option value="2650">2650</option>
                            <option value="2700">2700</option>
                            <option value="2750">2750</option>
                            <option value="2800">2850</option>
                            <option value="2900">2900</option>
                            <option value="2950">2950</option>
                            <option value="3000">3000</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="number_of_batteries_banks">Number Of Batteries Bank</label>
                        <select class="form-control form-control-lg mb-3" name="number_of_batteries_banks"
                                id="number_of_batteries_banks">
                            <option value="none" selected disabled hidden>Please Select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="battery_holding_time">Battery Holding Time</label>
                        <input type="number" class="form-control" id="battery_holding_time" name="battery_holding_time" value="{{request()->old('battery_holding_time')}}" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="commission_date">Commission Date</label>
                        <input type="date" class="form-control" id="commission_date"
                               name="commission_date" value="{{request()->old('commission_date')}}">
                    </div>
                    <div class="form-group">
                        <label for="lld_number">LLD Number</label>
                        <input type="number" class="form-control" id="lld_number" name="lld_number" value="{{request()->old('lld_number')}}">
                    </div>
                    <div class="form-group">
                        <label for="site_id">Sites Id</label>
                        <select class="form-control form-control-lg mb-3" name="site_id"
                                id="site_id">
                            <option value="none" selected disabled hidden>Please Select</option>
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
                            @foreach(\App\Models\WorkOrder::whereNotIn('id', function ($query){
                                   $query->select('work_order_id')->from('batteries');})->get() as $workOrder)
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
