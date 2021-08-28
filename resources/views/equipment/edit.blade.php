@extends('layouts.master')

@section('title')
    Equipment Information
@endsection

@section('sitemap')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('equipment.index')}}">Index</a></li>
    <li class="breadcrumb-item active"><a href="#">Edit</a></li>
@endsection

@section('content')

    <div class="container">
        <div class="card border-success">
            <div class="card-header font-weight-bold bg-gradient-success"><h3 class="mb-0">Update Equipments</h3></div>
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
                <form action="{{route('equipment.update', isset($transmissionEquipments)?$transmissionEquipments->id:'')}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="id">Id</label>
                        <input type="number" class="form-control" id="id"
                               name="id" value="{{$transmissionEquipments->id}}">
                    </div>
                    <div class="form-group">
                        <label for="subrack_name">SubRack Name</label>
                        <input type="text" class="form-control" id="subrack_name"
                               name="subrack_name" value="{{$transmissionEquipments->subrack_name}}">
                    </div>
                    <div class="form-group">
                        <label for="subrack_type">SubRack Type</label>
                        <input type="text" class="form-control" id="subrack_type"
                               name="subrack_type" value="{{$transmissionEquipments->subrack_type}}">
                    </div>
                    <div class="form-group">
                        <label for="equipment_type">Equipment Type</label>
                        <input type="text" class="form-control" id="equipment_type"
                               name="equipment_type" value="{{$transmissionEquipments->equipment_type}}">
                    </div>
                    <div class="form-group">
                        <label for="number_used_slots">Number Of Used Slots</label>
                        <input type="number" class="form-control" id="number_used_slots"
                               name="number_used_slots" value="{{$transmissionEquipments->number_used_slots}}">
                    </div>
                    <div class="form-group">
                        <label for="number_free_slots">Number Of Free Slots</label>
                        <input type="number" class="form-control" id="number_free_slots"
                               name="number_free_slots" value="{{$transmissionEquipments->number_free_slots}}">
                    </div>
                    <div class="form-group">
                        <label for="vendor">Vendor</label>
                        <input type="text" class="form-control" id="vendor"
                               name="vendor" value="{{$transmissionEquipments->vendor}}">
                    </div>
                    <div class="form-group">
                        <label for="transmission_otn_nes_id">Ne Id</label>
                        <select class="form-control form-control-lg mb-3" name="transmission_otn_nes_id"
                                id="transmission_otn_nes_id">
                            <option value="none" selected disabled hidden>Please Select</option>
                            @foreach(\App\Models\TransmissionOtnNes::all() as $ne)
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

