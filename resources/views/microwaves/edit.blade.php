@extends('layouts.master')

@section('title')
    Microwave Information
@endsection

@section('sitemap')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('microwaves.index')}}">Index</a></li>
    <li class="breadcrumb-item active"><a href="#">Edit</a></li>
@endsection

@section('content')

    <div class="container">
        <div class="card border-success">
            <div class="card-header font-weight-bold bg-gradient-success"><h3 class="mb-0">Update Microwave</h3></div>
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
                <form action="{{route('microwaves.update', isset($microwaves)?$microwaves->id:'')}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="id">Site Id</label>
                        <input type="number" class="form-control" id="id"
                               name="id" value="{{$microwaves->id}}">
                    </div>
                    <div class="form-group">
                        <label for="site_name">Site Name</label>
                        <input type="text" class="form-control" id="site_name"
                               name="site_name" value="{{$microwaves->site_name}}">
                    </div>
                    <div class="form-group">
                        <label for="site_type">Site Type</label>
                        <input type="text" class="form-control" id="site_type"
                               name="site_type" value="{{$microwaves->site_type}}">
                    </div>
                    <div class="form-group">
                        <label for="installed_capacity">Installed Capacity</label>
                        <input type="number" class="form-control" id="installed_capacity"
                               name="installed_capacity" value="{{$microwaves->installed_capacity}}" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="maximum_capacity">Maximum Capacity</label>
                        <input type="number" class="form-control" id="maximum_capacity"
                               name="maximum_capacity" value="{{$microwaves->maximum_capacity}}" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="polarization">Polarization</label>
                        <input type="number" class="form-control" id="polarization"
                               name="polarization" value="{{$microwaves->polarization}}">
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

