@extends('layouts.master')

@section('title')
    OTN Service Information
@endsection

@section('sitemap')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('otn_services.index')}}">Index</a></li>
    <li class="breadcrumb-item active"><a href="#">Edit</a></li>
@endsection

@section('content')

    <div class="container">
        <div class="card border-success">
            <div class="card-header font-weight-bold bg-gradient-success"><h3 class="mb-0">Update OTN Service</h3></div>
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
                <form action="{{route('otn_services.update', isset($otnServices)?$otnServices->id:'')}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="id">Id</label>
                        <input type="number" class="form-control" id="id"
                               name="id" value="{{$otnServices->id}}">
                    </div>
                    <div class="form-group">
                        <label for="service_name">Service Name</label>
                        <input type="text" class="form-control" id="service_name"
                               name="service_name" value="{{$otnServices->service_name}}">
                    </div>
                    <div class="form-group">
                        <label for="customer_name">Customer Name</label>
                        <input type="text" class="form-control" id="customer_name"
                               name="customer_name" value="{{$otnServices->customer_name}}">
                    </div>
                    <div class="form-group">
                        <label for="sla_type">SLA Type</label>
                        <input type="text" class="form-control" id="sla_type"
                               name="sla_type" value="{{$otnServices->sla_type}}">
                    </div>
                    <div class="form-group">
                        <label for="rate">Rate</label>
                        <input type="text" class="form-control" id="rate"
                               name="rate" value="{{$otnServices->rate}}">
                    </div>
                    <div class="form-group">
                        <label for="source_ne">Source NE</label>
                        <input type="text" class="form-control" id="source_ne"
                               name="source_ne" value="{{$otnServices->source_ne}}">
                    </div>
                    <div class="form-group">
                        <label for="source_port_number">Source Port Number</label>
                        <input type="number" class="form-control" id="source_port_number"
                               name="source_port_number" value="{{$otnServices->source_port_number}}">
                    </div>
                    <div class="form-group">
                        <label for="sink_ne">Sink NE</label>
                        <input type="text" class="form-control" id="sink_ne"
                               name="sink_ne" value="{{$otnServices->sink_ne}}">
                    </div>
                    <div class="form-group">
                        <label for="sink_board_id">Sink Board Id</label>
                        <input type="number" class="form-control" id="sink_board_id"
                               name="sink_board_id" value="{{$otnServices->sink_board_id}}">
                    </div>
                    <div class="form-group">
                        <label for="sink_port_number">Sink Port Number</label>
                        <input type="number" class="form-control" id="sink_port_number"
                               name="sink_port_number" value="{{$otnServices->sink_port_number}}">
                    </div>
                    <div class="form-group">
                        <label for="transmission_client_board_id">Source Board Id</label>
                        <select class="form-control form-control-lg mb-3" name="transmission_client_board_id"
                                id="transmission_client_board_id">
                            <option value="none" selected disabled hidden>Please Select</option>
                            @foreach(\App\Models\TransmissionClientBoards::all() as $ne)
                                <option value="{{$ne->id}}">{{$ne->id}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="transmission_site_id">Site Id</label>
                        <select class="form-control form-control-lg mb-3" name="transmission_site_id"
                                id="transmission_site_id">
                            <option value="none" selected disabled hidden>Please Select</option>
                            @foreach(\App\Models\TransmissionSite::all() as $site)
                                <option value="{{$site->id}}">{{$site->id}}</option>
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

