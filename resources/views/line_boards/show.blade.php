@extends('layouts.master')

@section('title')
    Line Board Information
@endsection
@section('content')
    <div class="container-fluid">
        <div class="text-right">
            <a href="{{route('line_boards.index')}}" class="btn btn-outline-dark mb-1"><i
                    class="fas fa-caret-left fa-2x"></i></a>
        </div>
        <div class="card border-primary mb-3">
            <div class="card-header bg-gradient-gray-dark font-weight-bold">Line Board Details</div>
            <div class="card-body text-black-50">
                <table class="table table-bordered">
                    <thead>
                    <tr class="bg-gradient-success">
                        <th scope="col">Id</th>
                        <th scope="col">Board Name</th>
                        <th scope="col">Slot Number</th>
                        <th scope="col">Port Capacity</th>
                        <th scope="col">Number Of Free Ports</th>
                        <th scope="col">Number Of Free Ports</th>
                        <th scope="col">Number Of Ports With Modules</th>
                        <th scope="col">SubRack Id</th>
                        <th scope="col">Site Id</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">{{ $lineBoards->id }}</th>
                        <td>{{ $lineBoards->board_name }}</td>
                        <td>{{ $lineBoards->slot_number }}</td>
                        <td>{{ $lineBoards->port_capacity }}</td>
                        <td>{{ $lineBoards->number_free_ports }}</td>
                        <td>{{ $lineBoards->number_used_ports }}</td>
                        <td>{{ $lineBoards->number_ports_modules }}</td>
                        <td>{{ $lineBoards->transmission_equipment_id }}</td>
                        <td>{{ $lineBoards->transmission_site_id }}</td>
                        <td>{{ $lineBoards->created_at->format('Y-m-d') }}</td>
                        <td>{{ $lineBoards->updated_at->format('Y-m-d') }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @if($lineBoards->transmission_line_board_wdm_trail->isNotEmpty())
            <div class="card border-success mb-3">
                <div class="card-header bg-gradient-gray-dark font-weight-bold">Line Board WDM Trail Details</div>
                <div class="card-body text-black-50">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="bg-gradient-success">
                            <th scope="col">Id</th>
                            <th scope="col">Trail Name</th>
                            <th scope="col">Working Mode</th>
                            <th scope="col">Source Ne</th>
                            <th scope="col">Source Port Number</th>
                            <th scope="col">Source Port WaveLength</th>
                            <th scope="col">Sink Ne</th>
                            <th scope="col">Sink Board Id</th>
                            <th scope="col">Sink Port Number</th>
                            <th scope="col">Sink Port WaveLength</th>
                            <th scope="col">Source Board Id</th>
                            <th scope="col">Site Id</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lineBoards->transmission_line_board_wdm_trail as $lineBoardWdmTrail)
                            <tr>
                                <th scope="row">{{ $lineBoardWdmTrail->id }}</th>
                                <td>{{ $lineBoardWdmTrail->trail_name }}</td>
                                <td>{{ $lineBoardWdmTrail->working_mode }}</td>
                                <td>{{ $lineBoardWdmTrail->source_ne }}</td>
                                <td>{{ $lineBoardWdmTrail->source_port_number }}</td>
                                <td>{{ $lineBoardWdmTrail->source_port_wave_length }}</td>
                                <td>{{ $lineBoardWdmTrail->sink_ne }}</td>
                                <td>{{ $lineBoardWdmTrail->sink_board_id }}</td>
                                <td>{{ $lineBoardWdmTrail->sink_port_number }}</td>
                                <td>{{ $lineBoardWdmTrail->sink_port_wave_length }}</td>
                                <td>{{ $lineBoardWdmTrail->transmission_line_boards_id }}</td>
                                <td>{{ $lineBoardWdmTrail->transmission_site_id }}</td>
                                <td>{{ $lineBoardWdmTrail->created_at->format('Y-m-d') }}</td>
                                <td>{{ $lineBoardWdmTrail->updated_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
{{--        @if($otnNes->transmission_site_line_fiber->isNotEmpty())--}}
{{--            <div class="card border-success mb-3">--}}
{{--                <div class="card-header bg-gradient-gray-dark font-weight-bold">Site Line Fiber Details</div>--}}
{{--                <div class="card-body text-black-50">--}}
{{--                    <table class="table table-bordered">--}}
{{--                        <thead>--}}
{{--                        <tr class="bg-gradient-success">--}}
{{--                            <th scope="col">Id</th>--}}
{{--                            <th scope="col">Direction Name</th>--}}
{{--                            <th scope="col">Cabling Method</th>--}}
{{--                            <th scope="col">Fiber Type</th>--}}
{{--                            <th scope="col">Core Number</th>--}}
{{--                            <th scope="col">Next Hope NE Id</th>--}}
{{--                            <th scope="col">Next Hope Distance</th>--}}
{{--                            <th scope="col">Site Id</th>--}}
{{--                            <th scope="col">Created At</th>--}}
{{--                            <th scope="col">Updated At</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @foreach($otnNes->transmission_site_line_fiber as $siteLine)--}}
{{--                            <tr>--}}
{{--                                <th scope="row">{{ $siteLine->id }}</th>--}}
{{--                                <td>{{ $siteLine->direction_name }}</td>--}}
{{--                                <td>{{ $siteLine->cabling_method }}</td>--}}
{{--                                <td>{{ $siteLine->fiber_type }}</td>--}}
{{--                                <td>{{ $siteLine->core_number }}</td>--}}
{{--                                <td>{{ $siteLine->next_hope_ne_id }}</td>--}}
{{--                                <td>{{ $siteLine->next_hope_distance }}</td>--}}
{{--                                <td>{{ $siteLine->transmission_site_id }}</td>--}}
{{--                                <td>{{ $siteLine->created_at->format('Y-m-d') }}</td>--}}
{{--                                <td>{{ $siteLine->updated_at->format('Y-m-d') }}</td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}
        <div class="text-right">
            <a href="{{route('line_boards.index')}}" class="btn btn-outline-dark btn-lg nav-item mb-2"><i
                    class="fas fa-caret-left fa-2x"></i></a>
        </div>
    </div>
@endsection
