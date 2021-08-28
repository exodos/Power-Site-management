@extends('layouts.master')

@section('title')
    Line Boards Information
@endsection

@section('sitemap')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('line_boards.index')}}">Index</a></li>
    <li class="breadcrumb-item active"><a href="#">Edit</a></li>
@endsection

@section('content')

    <div class="container">
        <div class="card border-success">
            <div class="card-header font-weight-bold bg-gradient-success"><h3 class="mb-0">Update Line Boards</h3></div>
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
                <form action="{{route('line_boards.update', isset($lineBoards)?$lineBoards->id:'')}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="id">Id</label>
                        <input type="number" class="form-control" id="id"
                               name="id" value="{{$lineBoards->id}}">
                    </div>
                    <div class="form-group">
                        <label for="board_name">Board Name</label>
                        <input type="text" class="form-control" id="board_name"
                               name="board_name" value="{{$lineBoards->board_name}}">
                    </div>
                    <div class="form-group">
                        <label for="slot_number">Slot Number</label>
                        <input type="number" class="form-control" id="slot_number"
                               name="slot_number" value="{{$lineBoards->slot_number}}">
                    </div>
                    <div class="form-group">
                        <label for="port_capacity">Port Capacity</label>
                        <input type="number" class="form-control" id="port_capacity"
                               name="port_capacity" value="{{$lineBoards->port_capacity}}" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="number_free_ports">Number Of Free Ports</label>
                        <input type="number" class="form-control" id="number_free_ports"
                               name="number_free_ports" value="{{$lineBoards->number_free_ports}}">
                    </div>
                    <div class="form-group">
                        <label for="number_used_ports">Number Of Used Ports</label>
                        <input type="number" class="form-control" id="number_used_ports"
                               name="number_used_ports" value="{{$lineBoards->number_used_ports}}">
                    </div>
                    <div class="form-group">
                        <label for="number_ports_modules">Number Of Ports With Modules</label>
                        <input type="number" class="form-control" id="number_ports_modules"
                               name="number_ports_modules" value="{{$lineBoards->number_ports_modules}}">
                    </div>
                    <div class="form-group">
                        <label for="transmission_equipment_id">SubRack Id</label>
                        <select class="form-control form-control-lg mb-3" name="transmission_equipment_id"
                                id="transmission_equipment_id">
                            <option value="none" selected disabled hidden>Please Select</option>
                            @foreach(\App\Models\TransmissionEquipment::all() as $rack)
                                <option value="{{$rack->id}}">{{$rack->id}}</option>
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

