@extends('layouts.master')

@section('title')
    Ip Address Information
@endsection

@section('sitemap')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('ipaddresses.index')}}">Index</a></li>
    <li class="breadcrumb-item active"><a href="#">Create</a></li>
@endsection

@section('content')

    <div class="container">
        <div class="card border-success">
            <div class="card-header font-weight-bold bg-gradient-primary"><h3 class="mb-0">Create Ip Address</h3></div>
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
                <form action="{{route('ipaddresses.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="class_b">Class B Ip</label>
                        <input type="text" class="form-control" id="class_b"
                               name="class_b">
                    </div>
                    <div class="form-group">
                        <label for="class_c">Class C Ip</label>
                        <input type="text" class="form-control" id="class_c"
                               name="class_c">
                    </div>
                    <div class="form-group">
                        <label for="usage">Usage</label>
                        <select class="form-control form-control-lg mb-3" name="usage"
                                id="usage">
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

