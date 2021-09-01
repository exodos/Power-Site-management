@extends('layouts.master')

@section('title')
    Fiber Splice Points Information
@endsection

@section('sitemap')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('fiber_splice_points.index')}}">Index</a></li>
    <li class="breadcrumb-item active"><a href="#">Edit</a></li>
@endsection

@section('content')

    <div class="container">
        <div class="card border-success">
            <div class="card-header font-weight-bold bg-gradient-success"><h3 class="mb-0">Update Fiber Splice Points</h3></div>
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
                <form action="{{route('fiber_splice_points.update', isset($fiberSplices)?$fiberSplices->id:'')}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="id">Fiber Splice Point Id</label>
                        <input type="number" class="form-control" id="id"
                               name="id" value="{{$fiberSplices->id}}">
                    </div>
                    <div class="form-group">
                        <label for="latitude">Latitude</label>
                        <input type="number" class="form-control" id="latitude"
                               name="latitude" value="{{$fiberSplices->latitude}}" step="0.000001">
                    </div>
                    <div class="form-group">
                        <label for="longitude">Longitude</label>
                        <input type="number" class="form-control" id="longitude"
                               name="longitude" value="{{$fiberSplices->longitude}}" step="0.000001">
                    </div>
                    <div class="form-group">
                        <label for="fiber_links_id">Link Id</label>
                        <select class="form-control form-control-lg mb-3" name="fiber_links_id"
                                id="fiber_links_id">
                            <option value="none" selected disabled hidden>Please Select</option>
                            @foreach(\App\Models\FiberLink::all() as $link)
                                <option value="{{$link->id}}">{{$link->id}}</option>
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

