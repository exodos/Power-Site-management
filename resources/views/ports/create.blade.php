@extends('layouts.master')

@section('title')
    Port Usage Information
@endsection

@section('sitemap')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('ports.index')}}">Index</a></li>
    <li class="breadcrumb-item active"><a href="#">Create</a></li>
@endsection

@section('content')

    <div class="container">
        <div class="card border-success">
            <div class="card-header font-weight-bold bg-gradient-primary"><h3 class="mb-0">Create Port Usage</h3></div>
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
                <form action="{{route('ports.store')}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="id">Id</label>
                        <input type="number" class="form-control" id="id"
                               name="id">
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name"
                               name="name">
                    </div>
                    <div class="form-group">
                        <label for="device_role">Device Role</label>
                        <select class="form-control form-control-lg mb-3" name="device_role"
                                id="device_role">
                            <option value="none" selected disabled hidden>Please Select</option>
                            <option value="IGW">IGW</option>
                            <option value="P">P</option>
                            <option value="PE">PE</option>
                            <option value="CS">CS</option>
                            <option value="OTHER">OTHER</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="slot">Slot</label>
                        <select class="form-control form-control-lg mb-3" name="slot"
                                id="slot">
                            <option value="none" selected disabled hidden>Please Select</option>
                            <option value="CONTROL">CONTROL</option>
                            <option value="SERVICE">SERVICE</option>
                            <option value="OTHER">OTHER</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="slot_usage">Slot Usage</label>
                        <select class="form-control form-control-lg mb-3" name="slot_usage"
                                id="slot_usage">
                            <option value="none" selected disabled hidden>Please Select</option>
                            <option value="FREE">FREE</option>
                            <option value="USED">USED</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="card_type">Card Type</label>
                        <select class="form-control form-control-lg mb-3" name="card_type"
                                id="card_type">
                            <option value="none" selected disabled hidden>Please Select</option>
                            <option value="100GE">100GE</option>
                            <option value="40GE">40GE</option>
                            <option value="10GE">10GE</option>
                            <option value="1GE(Opt)">1GE(Opt)</option>
                            <option value="1GE(Elec)">1GE(Elec)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="port_usage">Port Usage</label>
                        <select class="form-control form-control-lg mb-3" name="port_usage"
                                id="port_usage">
                            <option value="none" selected disabled hidden>Please Select</option>
                            <option value="FREE">FREE</option>
                            <option value="USED">USED</option>
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

