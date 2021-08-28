@extends('layouts.master')

@section('title')
    Amplifier Board Information
@endsection

@section('sitemap')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('amplifier_boards.index')}}">Index</a></li>
    <li class="breadcrumb-item active"><a href="#">Edit</a></li>
@endsection

@section('content')

    <div class="container">
        <div class="card border-success">
            <div class="card-header font-weight-bold bg-gradient-success"><h3 class="mb-0">Update Amplifier Board</h3></div>
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

                <form action="{{route('amplifier_boards.update', isset($amplifierBoards)?$amplifierBoards->id:'')}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="id">Id</label>
                        <input type="number" class="form-control" id="id"
                               name="id" value="{{$amplifierBoards->id}}">
                    </div>
                    <div class="form-group">
                        <label for="board_name">Board Name</label>
                        <input type="text" class="form-control" id="board_name"
                               name="board_name" value="{{$amplifierBoards->board_name}}">
                    </div>
                    <div class="form-group">
                        <label for="slot_number">Slot Number</label>
                        <input type="text" class="form-control" id="slot_number"
                               name="slot_number" value="{{$amplifierBoards->slot_number}}">
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <input type="text" class="form-control" id="type"
                               name="type" value="{{$amplifierBoards->type}}">
                    </div>
                    <div class="form-group">
                        <label for="gain">Gain</label>
                        <input type="text" class="form-control" id="gain"
                               name="gain" value="{{$amplifierBoards->gain}}">
                    </div>
                    <div class="form-group">
                        <label for="direction">Direction</label>
                        <input type="text" class="form-control" id="direction"
                               name="direction" value="{{$amplifierBoards->direction}}">
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
