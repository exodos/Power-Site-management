@extends('layouts.master')

@section('title')
    Line Fiber Information
@endsection

@section('sitemap')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('site_line_fibers.index')}}">Index</a></li>
    <li class="breadcrumb-item active"><a href="#">Create</a></li>
@endsection

@section('content')

    <div class="container">
        <div class="card border-primary">
            <div class="card-header font-weight-bold bg-gradient-success"><h3 class="mb-0">Create Line Fiber</h3>
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
                <form action="{{route('site_line_fibers.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="id">Id</label>
                        <input type="number" class="form-control" id="id" name="id" value="{{request()->old('id')}}">
                    </div>
                    <div class="form-group">
                        <label for="direction_name">Direction Name</label>
                        <input type="text" class="form-control" id="direction_name"
                               name="direction_name" value="{{request()->old('direction_name')}}">
                    </div>
                    <div class="form-group">
                        <label for="cabling_method">Cabling Method</label>
                        <input type="text" class="form-control" id="cabling_method"
                               name="cabling_method" value="{{request()->old('cabling_method')}}">
                    </div>
                    <div class="form-group">
                        <label for="fiber_type">Fiber Type</label>
                        <input type="text" class="form-control" id="fiber_type"
                               name="fiber_type" value="{{request()->old('fiber_type')}}">
                    </div>
                    <div class="form-group">
                        <label for="core_number">Core Number</label>
                        <input type="number" class="form-control" id="core_number"
                               name="core_number" value="{{request()->old('core_number')}}">
                    </div>
                    <div class="form-group">
                        <label for="next_hope_ne_id">Next Hope NE Id</label>
                        <input type="number" class="form-control" id="next_hope_ne_id"
                               name="next_hope_ne_id" value="{{request()->old('next_hope_ne_id')}}">
                    </div>
                    <div class="form-group">
                        <label for="next_hope_distance">Next Hope Distance</label>
                        <input type="number" class="form-control" id="next_hope_distance"
                               name="next_hope_distance" value="{{request()->old('next_hope_distance')}}">
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
                        <button class="btn btn-primary btn-lg">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
