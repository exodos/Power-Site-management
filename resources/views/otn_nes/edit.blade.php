@extends('layouts.master')

@section('title')
    NE Information
@endsection

@section('sitemap')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('otn_nes.index')}}">Index</a></li>
    <li class="breadcrumb-item active"><a href="#">Edit</a></li>
@endsection

@section('content')

    <div class="container">
        <div class="card border-success">
            <div class="card-header font-weight-bold bg-gradient-success"><h3 class="mb-0">Update NE</h3></div>
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
                <form action="{{route('otn_nes.update', isset($otnNes)?$otnNes->id:'')}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="id">Id</label>
                        <input type="number" class="form-control" id="id"
                               name="id" value="{{$otnNes->id}}">
                    </div>
                    <div class="form-group">
                        <label for="ne_name">NE Name</label>
                        <input type="text" class="form-control" id="ne_name"
                               name="ne_name" value="{{$otnNes->ne_name}}">
                    </div>
                    <div class="form-group">
                        <label for="ne_type">NE Type</label>
                        <input type="text" class="form-control" id="ne_type"
                               name="ne_type" value="{{$otnNes->ne_type}}">
                    </div>
                    <div class="form-group">
                        <label for="ne_vendor">NE Type</label>
                        <input type="text" class="form-control" id="ne_vendor"
                               name="ne_vendor" value="{{$otnNes->ne_vendor}}">
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

