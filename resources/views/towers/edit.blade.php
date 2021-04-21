@extends('layouts.master')

@section('title')
    Update Towers
@endsection

@section('sitemap')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('towers.index')}}">Index</a></li>
    <li class="breadcrumb-item active"><a href="#">Update</a></li>
@endsection

@section('content')

    <div class="container">
        <div class="card border-primary">
            <div class="card-header font-weight-bold bg-primary"><h3 class="mb-0">Update Towers</h3></div>
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

                <form action="{{route('towers.update', isset($towers)?$towers->id:'')}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="id">Tower Id</label>
                        <input type="number" class="form-control" id="id"
                               name="id">
                    </div>
                    <div class="form-group">
                        <label for="towers_brand">Towers Brand</label>
                        <input type="text" class="form-control" id="towers_brand"
                               name="towers_brand">
                    </div>
                    <div class="form-group">
                        <label for="towers_height">Towers Height</label>
                        <input type="number" class="form-control" id="towers_height"
                               name="towers_height" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="towers_load_capacity">Towers Load Capacity</label>
                        <input type="number" class="form-control" id="towers_load_capacity"
                               name="towers_load_capacity" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="towers_sharing_operator">Towers Sharing Operator</label>
                        <input type="text" class="form-control" id="towers_sharing_operator"
                               name="towers_sharing_operator">
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
                        <button class="btn btn-success">Update Solar Panel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
