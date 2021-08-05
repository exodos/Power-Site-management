@extends('layouts.master')
@section('title')
    DashBoard Information
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card border-success mb-3">
            <div class="card-header bg-gradient-primary font-weight-bold">Global QTY</div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{--                {{ __('You are logged in!') }}--}}
                {!! $chart->container() !!}
            </div>
        </div>
        <div class="card border-success mb-3">
            <div class="card-header bg-gradient-primary font-weight-bold">Regional Power Source</div>
            <div class="card-body">
                {!! $chartRegion->container() !!}
            </div>
        </div>
        <div class="card border-success mb-3">
            <div class="card-header bg-gradient-primary font-weight-bold">Number Of Generator Per Region</div>
            <div class="card-body">
                {!! $chartNumberGenerator->container() !!}
            </div>
        </div>
    </div>
@endsection
@section('chart')
    {!! $chart->script() !!}
    {!! $chartRegion->script() !!}
    {!! $chartNumberGenerator->script() !!}
@endsection
