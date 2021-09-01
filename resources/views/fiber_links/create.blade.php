@extends('layouts.master')

@section('title')
    Fiber Links Information
@endsection

@section('sitemap')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('fiber_links.index')}}">Index</a></li>
    <li class="breadcrumb-item active"><a href="#">Create</a></li>
@endsection

@section('content')

    <div class="container">
        <div class="card border-primary">
            <div class="card-header font-weight-bold bg-gradient-success"><h3 class="mb-0">Create Fiber Links</h3>
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
                <form action="{{route('fiber_links.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="id">Id</label>
                        <input type="number" class="form-control" id="id" name="id" value="{{request()->old('id')}}">
                    </div>
                    <div class="form-group">
                        <label for="link_name">Link Name</label>
                        <input type="text" class="form-control" id="link_name"
                               name="link_name" value="{{request()->old('id')}}">
                    </div>
                    <div class="form-group">
                        <label for="fiber_type">Fiber Type</label>
                        <input type="text" class="form-control" id="fiber_type"
                               name="fiber_type" value="{{request()->old('fiber_type')}}">
                    </div>
                    <div class="form-group">
                        <label for="used_core">Used Core</label>
                        <input type="number" class="form-control" id="used_core"
                               name="used_core" value="{{request()->old('used_core')}}">
                    </div>
                    <div class="form-group">
                        <label for="free_core">Free Core</label>
                        <input type="number" class="form-control" id="free_core"
                               name="free_core" value="{{request()->old('free_core')}}">
                    </div>
                    <div class="form-group">
                        <label for="number_splice_points">Number Of Splice Points</label>
                        <input type="number" class="form-control" id="number_splice_points"
                               name="number_splice_points" value="{{request()->old('number_splice_points')}}">
                    </div>
                    <div class="form-group">
                        <label for="average_link_loss">Average Link Loss</label>
                        <input type="number" class="form-control" id="average_link_loss"
                               name="average_link_loss" value="{{request()->old('average_link_loss')}}" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="ofc_type">OFC Type</label>
                        <input type="text" class="form-control" id="ofc_type"
                               name="ofc_type" value="{{request()->old('ofc_type')}}">
                    </div>
                    <div class="form-group">
                        <label for="a_end_odf_connector_type">A End ODF Connector Type</label>
                        <input type="text" class="form-control" id="a_end_odf_connector_type"
                               name="a_end_odf_connector_type" value="{{request()->old('a_end_odf_connector_type')}}">
                    </div>
                    <div class="form-group">
                        <label for="z_end_odf_connector_type">Z End ODF Connector Type</label>
                        <input type="text" class="form-control" id="z_end_odf_connector_type"
                               name="z_end_odf_connector_type" value="{{request()->old('z_end_odf_connector_type')}}">
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
                        <button class="btn btn-primary btn-lg">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
