@extends('layouts.master')

@section('title')
    Site Information
@endsection

@section('sitemap')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('transmission_site.index')}}">Index</a></li>
    <li class="breadcrumb-item active"><a href="#">Create</a></li>
@endsection

@section('content')

    <div class="container">
        <div class="card border-primary">
            <div class="card-header font-weight-bold bg-gradient-success"><h3 class="mb-0">Create Site</h3>
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

                <form action="{{route('transmission_site.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="id">Id</label>
                        <input type="number" class="form-control" id="id" name="id" value="{{request()->old('id')}}">
                    </div>
                    <div class="form-group">
                        <label for="site_name">Site Name</label>
                        <input type="text" class="form-control" id="site_name"
                               name="site_name" value="{{request()->old('site_name')}}">
                    </div>
                    <div class="form-group">
                        <label for="latitude">Latitude</label>
                        <input type="number" class="form-control" id="latitude"
                               name="latitude" value="{{request()->old('latitude')}}"step="0.00001">
                    </div>
                    <div class="form-group">
                        <label for="longitude">Longitude</label>
                        <input type="number" class="form-control" id="longitude"
                               name="longitude" value="{{request()->old('longitude')}}" step="0.00001">
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city"
                               name="city" value="{{request()->old('city')}}">
                    </div>
                    <div class="form-group">
                        <label for="region">Region</label>
                        <input type="text" class="form-control" id="region"
                               name="region" value="{{request()->old('region')}}">
                    </div>
                    <div class="form-group">
                        <label for="et_region_zone">ET Region/Zone</label>
                        <input type="text" class="form-control" id="et_region_zone"
                               name="et_region_zone" value="{{request()->old('et_region_zone')}}">
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary btn-lg">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
