@extends('layouts.master')

@section('title')
    Client Board Information
@endsection
@section('content')
    <div class="container-fluid">
        <div class="text-right">
            <a href="{{route('client_boards.index')}}" class="btn btn-outline-dark mb-1"><i
                    class="fas fa-caret-left fa-2x"></i></a>
        </div>
        <div class="card border-primary mb-3">
            <div class="card-header bg-gradient-gray-dark font-weight-bold">Client Board Details</div>
            <div class="card-body text-black-50">
                <table class="table table-bordered">
                    <thead>
                    <tr class="bg-gradient-success">
                        <th scope="col">Id</th>
                        <th scope="col">Board Name</th>
                        <th scope="col">Slot Number</th>
                        <th scope="col">Port Capacity</th>
                        <th scope="col">Number Of Free Ports</th>
                        <th scope="col">Number Of Used Ports</th>
                        <th scope="col">Number Of Ports With Modules</th>
                        <th scope="col">SubRack Id</th>
                        <th scope="col">Site Id</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">{{ $clientBoards->id }}</th>
                        <td>{{ $clientBoards->board_name }}</td>
                        <td>{{ $clientBoards->slot_number }}</td>
                        <td>{{ $clientBoards->port_capacity }}</td>
                        <td>{{ $clientBoards->number_free_ports }}</td>
                        <td>{{ $clientBoards->number_used_ports }}</td>
                        <td>{{ $clientBoards->number_ports_modules }}</td>
                        <td>{{ $clientBoards->transmission_equipment_id }}</td>
                        <td>{{ $clientBoards->transmission_site_id }}</td>
                        <td>{{ $clientBoards->created_at->format('Y-m-d') }}</td>
                        <td>{{ $clientBoards->updated_at->format('Y-m-d') }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @if($clientBoards->transmission_otn_service->isNotEmpty())
            <div class="card border-success mb-3">
                <div class="card-header bg-gradient-gray-dark font-weight-bold">OTn Services Details</div>
                <div class="card-body text-black-50">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="bg-gradient-success">
                            <th scope="col">Id</th>
                            <th scope="col">Service Name</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">SLA Type</th>
                            <th scope="col">Rate</th>
                            <th scope="col">Source NE</th>
                            <th scope="col">Source Port Number</th>
                            <th scope="col">Sink NE</th>
                            <th scope="col">Sink Board Id</th>
                            <th scope="col">Sink Port Number</th>
                            <th scope="col">Source Board Id</th>
                            <th scope="col">Site Id</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clientBoards->transmission_otn_service as $otnService)
                            <tr>
                                <th scope="row">{{ $otnService->id }}</th>
                                <td>{{ $otnService->service_name }}</td>
                                <td>{{ $otnService->customer_name }}</td>
                                <td>{{ $otnService->sla_type }}</td>
                                <td>{{ $otnService->rate }}</td>
                                <td>{{ $otnService->source_ne }}</td>
                                <td>{{ $otnService->source_port_number }}</td>
                                <td>{{ $otnService->sink_ne }}</td>
                                <td>{{ $otnService->sink_board_id }}</td>
                                <td>{{ $otnService->sink_port_number }}</td>
                                <td>{{ $otnService->transmission_client_boards_id }}</td>
                                <td>{{ $otnService->transmission_site_id }}</td>
                                <td>{{ $otnService->created_at->format('Y-m-d') }}</td>
                                <td>{{ $otnService->updated_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
{{--        @if($transmissionEquipments->transmission_roadm_board->isNotEmpty())--}}
{{--            <div class="card border-success mb-3">--}}
{{--                <div class="card-header bg-gradient-gray-dark font-weight-bold">Roadm Board Details</div>--}}
{{--                <div class="card-body text-black-50">--}}
{{--                    <table class="table table-bordered">--}}
{{--                        <thead>--}}
{{--                        <tr class="bg-gradient-success">--}}
{{--                            <th scope="col">Id</th>--}}
{{--                            <th scope="col">Board Name</th>--}}
{{--                            <th scope="col">Slot Number</th>--}}
{{--                            <th scope="col">Type</th>--}}
{{--                            <th scope="col">Number Of Free Ports</th>--}}
{{--                            <th scope="col">Number Of Used Ports</th>--}}
{{--                            <th scope="col">Direction</th>--}}
{{--                            <th scope="col">Site Id</th>--}}
{{--                            <th scope="col">Created At</th>--}}
{{--                            <th scope="col">Updated At</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @foreach($transmissionEquipments->transmission_roadm_board as $roadmBoard)--}}
{{--                            <tr>--}}
{{--                                <th scope="row">{{ $roadmBoard->id }}</th>--}}
{{--                                <td>{{ $roadmBoard->board_name }}</td>--}}
{{--                                <td>{{ $roadmBoard->slot_number }}</td>--}}
{{--                                <td>{{ $roadmBoard->type }}</td>--}}
{{--                                <td>{{ $roadmBoard->number_free_ports }}</td>--}}
{{--                                <td>{{ $roadmBoard->number_used_ports }}</td>--}}
{{--                                <td>{{ $roadmBoard->direction }}</td>--}}
{{--                                <td>{{ $roadmBoard->transmission_site_id }}</td>--}}
{{--                                <td>{{ $roadmBoard->created_at->format('Y-m-d') }}</td>--}}
{{--                                <td>{{ $roadmBoard->updated_at->format('Y-m-d') }}</td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}
        <div class="text-right">
            <a href="{{route('client_boards.index')}}" class="btn btn-outline-dark btn-lg nav-item mb-2"><i
                    class="fas fa-caret-left fa-2x"></i></a>
        </div>
    </div>
@endsection
