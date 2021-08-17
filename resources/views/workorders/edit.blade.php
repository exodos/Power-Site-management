@extends('layouts.master')

@section('title')
    Update Work Orders
@endsection

@section('sitemap')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('workorders.index')}}">Index</a></li>
    <li class="breadcrumb-item active"><a href="#">Update</a></li>
@endsection

@section('content')
    <div class="container">
        <div class="card border-success">
            <div class="card-header font-weight-bold bg-gradient-primary"><h3 class="mb-0">Update Work Orders</h3></div>
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
                <form action="{{route('workorders.update', isset($workorders)?$workorders->id:'')}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="id">Id</label>
                        <input type="number" class="form-control" id="id"
                               name="id" value="{{$workorders->id}}">
                    </div>
                    <div class="form-group">
                        <label for="work_orders_number">Work Orders Number</label>
                        <input type="text" class="form-control" id="work_orders_number"
                               name="work_orders_number" value="{{$workorders->work_orders_number}}">
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary btn-lg">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
