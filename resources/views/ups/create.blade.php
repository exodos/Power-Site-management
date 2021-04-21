@extends('layouts.master')

@section('title')
    Ups Information
@endsection

@section('sitemap')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('ups.index')}}">Index</a></li>
    <li class="breadcrumb-item active"><a href="#">Create</a></li>
@endsection

@section('content')

    <div class="container">
        <div class="card border-primary">
            <div class="card-header font-weight-bold bg-primary"><h3 class="mb-0">Create Ups</h3></div>
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

                <form action="{{route('ups.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="id">Id</label>
                        <input type="number" class="form-control" id="id" name="id">
                    </div>
                    <div class="form-group">
                        <label for="ups_model">Ups Model</label>
                        <input type="text" class="form-control" id="ups_model" name="ups_model">
                    </div>
                    <div class="form-group">
                        <label for="ups_capacity">Ups Capacity</label>
                        <input type="number" class="form-control" id="ups_capacity" name="ups_capacity" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="number_of_ups_model">Number Of Ups Model</label>
                        <input type="number" class="form-control" id="number_of_ups_model" name="number_of_ups_model">
                    </div>
                    <div class="form-group">
                        <label for="site_id">Site Id</label>
                        <select class="form-control form-control-lg mb-3" name="site_id"
                                id="site_id">
                            <option value="">Please Select</option>
                            @foreach(\App\Models\Site::all() as $sites)
                                <option value="{{$sites->id}}">{{$sites->id}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-success">Add Ups</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
