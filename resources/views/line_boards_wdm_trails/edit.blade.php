@extends('layouts.master')

@section('title')
    Line Board Wdm Trails Information
@endsection

@section('sitemap')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('line_boards_wdm_trails.index')}}">Index</a></li>
    <li class="breadcrumb-item active"><a href="#">Edit</a></li>
@endsection

@section('content')

    <div class="container">
        <div class="card border-success">
            <div class="card-header font-weight-bold bg-gradient-success"><h3 class="mb-0">Update Line Board Wdm Trails</h3></div>
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
                <form action="{{route('line_boards_wdm_trails.update', isset($lineBoardWdmTrails)?$lineBoardWdmTrails->id:'')}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="id">Id</label>
                        <input type="number" class="form-control" id="id"
                               name="id" value="{{$lineBoardWdmTrails->id}}">
                    </div>
                    <div class="form-group">
                        <label for="trail_name">Trail Name</label>
                        <input type="text" class="form-control" id="trail_name"
                               name="trail_name" value="{{$lineBoardWdmTrails->trail_name}}">
                    </div>
                    <div class="form-group">
                        <label for="working_mode">Working Mode</label>
                        <input type="text" class="form-control" id="working_mode"
                               name="working_mode" value="{{$lineBoardWdmTrails->working_mode}}">
                    </div>
                    <div class="form-group">
                        <label for="source_ne">Source Ne</label>
                        <input type="text" class="form-control" id="source_ne"
                               name="source_ne" value="{{$lineBoardWdmTrails->source_ne}}">
                    </div>
                    <div class="form-group">
                        <label for="source_port_number">Source Port Number</label>
                        <input type="number" class="form-control" id="source_port_number"
                               name="source_port_number" value="{{$lineBoardWdmTrails->source_port_number}}">
                    </div>
                    <div class="form-group">
                        <label for="source_port_wave_length">Source Port WaveLength</label>
                        <input type="number" class="form-control" id="source_port_wave_length"
                               name="source_port_wave_length" value="{{$lineBoardWdmTrails->source_port_wave_length}}" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="sink_ne">Sink Ne</label>
                        <input type="text" class="form-control" id="sink_ne"
                               name="sink_ne" value="{{$lineBoardWdmTrails->sink_ne}}">
                    </div>
                    <div class="form-group">
                        <label for="sink_board_id">Sink Board Id</label>
                        <input type="number" class="form-control" id="sink_board_id"
                               name="sink_board_id" value="{{$lineBoardWdmTrails->sink_board_id}}">
                    </div>
                    <div class="form-group">
                        <label for="sink_port_number">Sink Port Number</label>
                        <input type="number" class="form-control" id="sink_port_number"
                               name="sink_port_number" value="{{$lineBoardWdmTrails->sink_port_number}}">
                    </div>
                    <div class="form-group">
                        <label for="sink_port_wave_length">Sink Port WaveLength</label>
                        <input type="number" class="form-control" id="sink_port_wave_length"
                               name="sink_port_wave_length" value="{{$lineBoardWdmTrails->sink_port_wave_length}}" step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="transmission_line_boards_id">Source Board Id</label>
                        <select class="form-control form-control-lg mb-3" name="transmission_line_boards_id"
                                id="transmission_line_boards_id">
                            <option value="none" selected disabled hidden>Please Select</option>
                            @foreach(\App\Models\TransmissionLineBoards::all() as $line)
                                <option value="{{$line->id}}">{{$line->id}}</option>
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

