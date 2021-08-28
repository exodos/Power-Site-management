@extends('layouts.master')
@section('title')
    DashBoard Information
@endsection
@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                <span style="font-size: 2em; color: #00a87d">
                    <i class="fas fa-info-circle"></i>
                </span>
                {{ session('status') }}
            </div>
        @endif
    </div>
    <div class="container-fluid">
        <div class="card border-success mb-3">
            <div class="card-header bg-gradient-primary font-weight-bold">Global QTY</div>
            <div class="card-body">
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
