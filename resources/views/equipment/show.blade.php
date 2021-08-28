@extends('layouts.master')

@section('title')
    Transmission Equipment Information
@endsection
@section('content')
    <div class="container-fluid">
        <div class="text-right">
            <a href="{{route('equipment.index')}}" class="btn btn-outline-dark mb-1"><i
                    class="fas fa-caret-left fa-2x"></i></a>
        </div>
        <div class="card border-primary mb-3">
            <div class="card-header bg-gradient-gray-dark font-weight-bold">Equipment Details</div>
            <div class="card-body text-black-50">
                <table class="table table-bordered">
                    <thead>
                    <tr class="bg-gradient-success">
                        <th scope="col">Id</th>
                        <th scope="col">SubRack Name</th>
                        <th scope="col">SubRack Type</th>
                        <th scope="col">Equipment Type</th>
                        <th scope="col">Number Of Used Slots</th>
                        <th scope="col">Number Of Free Slots</th>
                        <th scope="col">Vendor</th>
                        <th scope="col">Ne Id</th>
                        <th scope="col">Site Id</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">{{ $transmissionEquipments->id }}</th>
                        <td>{{ $transmissionEquipments->subrack_name }}</td>
                        <td>{{ $transmissionEquipments->subrack_type }}</td>
                        <td>{{ $transmissionEquipments->equipment_type }}</td>
                        <td>{{ $transmissionEquipments->number_used_slots }}</td>
                        <td>{{ $transmissionEquipments->number_free_slots }}</td>
                        <td>{{ $transmissionEquipments->vendor }}</td>
                        <td>{{ $transmissionEquipments->transmission_otn_ne_id }}</td>
                        <td>{{ $transmissionEquipments->transmission_site_id }}</td>
                        <td>{{ $transmissionEquipments->created_at->format('Y-m-d') }}</td>
                        <td>{{ $transmissionEquipments->updated_at->format('Y-m-d') }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        @if($transmissionEquipments->transmission_amplifier_board->isNotEmpty())
            <div class="card border-success mb-3">
                <div class="card-header bg-gradient-gray-dark font-weight-bold">Amplifier Boards Details</div>
                <div class="card-body text-black-50">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="bg-gradient-success">
                            <th scope="col">Id</th>
                            <th scope="col">Board Name</th>
                            <th scope="col">Slot Number</th>
                            <th scope="col">Type</th>
                            <th scope="col">Gain</th>
                            <th scope="col">direction</th>
                            <th scope="col">Site Id</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transmissionEquipments->transmission_amplifier_board as $amplifierBoard)
                            <tr>
                                <th scope="row">{{ $amplifierBoard->id }}</th>
                                <td>{{ $amplifierBoard->board_name }}</td>
                                <td>{{ $amplifierBoard->slot_number }}</td>
                                <td>{{ $amplifierBoard->type }}</td>
                                <td>{{ $amplifierBoard->gain }}</td>
                                <td>{{ $amplifierBoard->direction }}</td>
                                <td>{{ $amplifierBoard->transmission_site_id }}</td>
                                <td>{{ $amplifierBoard->created_at->format('Y-m-d') }}</td>
                                <td>{{ $amplifierBoard->updated_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        @if($transmissionEquipments->transmission_client_board->isNotEmpty())
            <div class="card border-success mb-3">
                <div class="card-header bg-gradient-gray-dark font-weight-bold">Client Boards Details</div>
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
                            <th scope="col">Site Id</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transmissionEquipments->transmission_client_board as $clientBoard)
                            <tr>
                                <th scope="row">{{ $clientBoard->id }}</th>
                                <td>{{ $clientBoard->board_name }}</td>
                                <td>{{ $clientBoard->slot_number }}</td>
                                <td>{{ $clientBoard->port_capacity }}</td>
                                <td>{{ $clientBoard->number_free_ports }}</td>
                                <td>{{ $clientBoard->number_used_ports }}</td>
                                <td>{{ $clientBoard->number_ports_modules }}</td>
                                <td>{{ $clientBoard->transmission_site_id }}</td>
                                <td>{{ $clientBoard->created_at->format('Y-m-d') }}</td>
                                <td>{{ $clientBoard->updated_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        @if($transmissionEquipments->transmission_line_board->isNotEmpty())
            <div class="card border-success mb-3">
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
                            <th scope="col">Site Id</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transmissionEquipments->transmission_line_board as $lineBoard)
                            <tr>
                                <th scope="row">{{ $lineBoard->id }}</th>
                                <td>{{ $lineBoard->board_name }}</td>
                                <td>{{ $lineBoard->slot_number }}</td>
                                <td>{{ $lineBoard->port_capacity }}</td>
                                <td>{{ $lineBoard->number_free_ports }}</td>
                                <td>{{ $lineBoard->number_used_ports }}</td>
                                <td>{{ $lineBoard->number_ports_modules }}</td>
                                <td>{{ $lineBoard->transmission_site_id }}</td>
                                <td>{{ $lineBoard->created_at->format('Y-m-d') }}</td>
                                <td>{{ $lineBoard->updated_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
            @if($transmissionEquipments->transmission_mux_demux_board->isNotEmpty())
            <div class="card border-success mb-3">
                <div class="card-header bg-gradient-gray-dark font-weight-bold">Mux Demux Board Details</div>
                <div class="card-body text-black-50">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="bg-gradient-success">
                            <th scope="col">Id</th>
                            <th scope="col">Board Name</th>
                            <th scope="col">Slot Number</th>
                            <th scope="col">Type</th>
                            <th scope="col">Number Of Free Ports</th>
                            <th scope="col">Number Of Used Ports</th>
                            <th scope="col">Direction</th>
                            <th scope="col">Site Id</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transmissionEquipments->transmission_mux_demux_board as $muxDemuxBoard)
                            <tr>
                                <th scope="row">{{ $muxDemuxBoard->id }}</th>
                                <td>{{ $muxDemuxBoard->board_name }}</td>
                                <td>{{ $muxDemuxBoard->slot_number }}</td>
                                <td>{{ $muxDemuxBoard->type }}</td>
                                <td>{{ $muxDemuxBoard->number_free_ports }}</td>
                                <td>{{ $muxDemuxBoard->number_used_ports }}</td>
                                <td>{{ $muxDemuxBoard->direction }}</td>
                                <td>{{ $muxDemuxBoard->transmission_site_id }}</td>
                                <td>{{ $muxDemuxBoard->created_at->format('Y-m-d') }}</td>
                                <td>{{ $muxDemuxBoard->updated_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        @if($transmissionEquipments->transmission_roadm_board->isNotEmpty())
            <div class="card border-success mb-3">
                <div class="card-header bg-gradient-gray-dark font-weight-bold">Roadm Board Details</div>
                <div class="card-body text-black-50">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="bg-gradient-success">
                            <th scope="col">Id</th>
                            <th scope="col">Board Name</th>
                            <th scope="col">Slot Number</th>
                            <th scope="col">Type</th>
                            <th scope="col">Number Of Free Ports</th>
                            <th scope="col">Number Of Used Ports</th>
                            <th scope="col">Direction</th>
                            <th scope="col">Site Id</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transmissionEquipments->transmission_roadm_board as $roadmBoard)
                            <tr>
                                <th scope="row">{{ $roadmBoard->id }}</th>
                                <td>{{ $roadmBoard->board_name }}</td>
                                <td>{{ $roadmBoard->slot_number }}</td>
                                <td>{{ $roadmBoard->type }}</td>
                                <td>{{ $roadmBoard->number_free_ports }}</td>
                                <td>{{ $roadmBoard->number_used_ports }}</td>
                                <td>{{ $roadmBoard->direction }}</td>
                                <td>{{ $roadmBoard->transmission_site_id }}</td>
                                <td>{{ $roadmBoard->created_at->format('Y-m-d') }}</td>
                                <td>{{ $roadmBoard->updated_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        <div class="text-right">
            <a href="{{route('equipment.index')}}" class="btn btn-outline-dark btn-lg nav-item mb-2"><i
                    class="fas fa-caret-left fa-2x"></i></a>
        </div>
    </div>
@endsection
