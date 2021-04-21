@extends('layouts.master')

@section('title')
    Rectifier Information
@endsection

@section('sitemap')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('rectifiers.index')}}">Index</a></li>
    <li class="breadcrumb-item active"><a href="#">Create</a></li>
@endsection

@section('content')

    <div class="container">
        <div class="card border-primary">
            <div class="card-header font-weight-bold bg-primary"><h3 class="mb-0">Create Rectifier</h3></div>
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

                <form action="{{route('rectifiers.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="id">Id</label>
                        <input type="number" class="form-control" id="id" name="id">
                    </div>
                    <div class="form-group">
                        <label for="rectifiers_model">Rectifiers Model</label>
                        <input type="text" class="form-control" id="rectifiers_model" name="rectifiers_model">
                    </div>
                    <div class="form-group">
                        <label for="number_of_rectifiers">Number Of Rectifiers</label>
                        <input type="number" class="form-control" id="number_of_rectifiers" name="number_of_rectifiers">
                    </div>
                    <div class="form-group">
                        <label for="rectifiers_capacity">Rectifiers Capacity</label>
                        <input type="number" class="form-control" id="rectifiers_capacity" name="rectifiers_capacity" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="site_id">Sites Id</label>
                        <select class="form-control form-control-lg mb-3" name="site_id"
                                id="site_id">
                            <option value="">Please Select</option>
                            @foreach(\App\Models\Site::all() as $sites)
                                <option value="{{$sites->id}}">{{$sites->id}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-success">Add Rectifiers</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
