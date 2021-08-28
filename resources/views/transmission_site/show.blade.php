@extends('layouts.master')

@section('title')
    Transmission Site Information
@endsection
@section('content')
    <div class="container-fluid">
        <div class="text-right">
            <a href="{{route('transmission_site.index')}}" class="btn btn-outline-dark mb-1"><i
                    class="fas fa-caret-left fa-2x"></i></a>
        </div>
        <div class="card border-primary mb-3">
            <div class="card-header bg-gradient-gray-dark font-weight-bold">Transmission Site Details</div>
            <div class="card-body text-black-50">
                <table class="table table-bordered">
                    <thead>
                    <tr class="bg-gradient-success">
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Latitude</th>
                        <th scope="col">Longitude</th>
                        <th scope="col">City</th>
                        <th scope="col">Region</th>
                        <th scope="col">Et Region/Zone</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">{{ $transmissionSite->id }}</th>
                        <td>{{ $transmissionSite->site_name }}</td>
                        <td>{{ $transmissionSite->latitude }}</td>
                        <td>{{ $transmissionSite->longitude }}</td>
                        <td>{{ $transmissionSite->city }}</td>
                        <td>{{ $transmissionSite->region }}</td>
                        <td>{{ $transmissionSite->et_region_zone }}</td>
                        <td>{{ $transmissionSite->created_at->format('Y-m-d') }}</td>
                        <td>{{ $transmissionSite->updated_at->format('Y-m-d') }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @if($transmissionSite->transmission_amplifier_board->isNotEmpty())
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
                            <th scope="col">SubRack Id</th>
                            <th scope="col">Site Id</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transmissionSite->transmission_amplifier_board as $amplifierBoard)
                            <tr>
                                <th scope="row">{{ $amplifierBoard->id }}</th>
                                <td>{{ $amplifierBoard->board_name }}</td>
                                <td>{{ $amplifierBoard->slot_number }}</td>
                                <td>{{ $amplifierBoard->type }}</td>
                                <td>{{ $amplifierBoard->gain }}</td>
                                <td>{{ $amplifierBoard->direction }}</td>
                                <td>{{ $amplifierBoard->transmission_equipment_id }}</td>
                                <td>{{ $amplifierBoard->site_id }}</td>
                                <td>{{ $amplifierBoard->created_at->format('Y-m-d') }}</td>
                                <td>{{ $amplifierBoard->updated_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        @if($transmissionSite->transmission_client_board->isNotEmpty())
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
                            <th scope="col">SubRack Id</th>
                            <th scope="col">Site Id</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transmissionSite->transmission_client_board as $clientBoard)
                            <tr>
                                <th scope="row">{{ $clientBoard->id }}</th>
                                <td>{{ $clientBoard->board_name }}</td>
                                <td>{{ $clientBoard->slot_number }}</td>
                                <td>{{ $clientBoard->port_capacity }}</td>
                                <td>{{ $clientBoard->number_free_ports }}</td>
                                <td>{{ $clientBoard->number_used_ports }}</td>
                                <td>{{ $clientBoard->number_ports_modules }}</td>
                                <td>{{ $clientBoard->transmission_equipment_id }}</td>
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
        @if($transmissionSite->transmission_equipment->isNotEmpty())
            <div class="card border-success mb-3">
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
                        @foreach($transmissionSite->transmission_equipment as $equipment)
                            <tr>
                                <th scope="row">{{ $equipment->id }}</th>
                                <td>{{ $equipment->subrack_name }}</td>
                                <td>{{ $equipment->subrack_type }}</td>
                                <td>{{ $equipment->equipment_type }}</td>
                                <td>{{ $equipment->number_used_slots }}</td>
                                <td>{{ $equipment->number_free_slots }}</td>
                                <td>{{ $equipment->vendor }}</td>
                                <td>{{ $equipment->transmission_otn_nes_id }}</td>
                                <td>{{ $equipment->transmission_site_id }}</td>
                                <td>{{ $equipment->created_at->format('Y-m-d') }}</td>
                                <td>{{ $equipment->updated_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        @if($transmissionSite->transmission_line_board->isNotEmpty())
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
                            <th scope="col">SubRack Id</th>
                            <th scope="col">Site Id</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transmissionSite->transmission_line_board as $lineBoard)
                            <tr>
                                <th scope="row">{{ $lineBoard->id }}</th>
                                <td>{{ $lineBoard->board_name }}</td>
                                <td>{{ $lineBoard->slot_number }}</td>
                                <td>{{ $lineBoard->port_capacity }}</td>
                                <td>{{ $lineBoard->number_free_ports }}</td>
                                <td>{{ $lineBoard->number_used_ports }}</td>
                                <td>{{ $lineBoard->number_ports_modules }}</td>
                                <td>{{ $lineBoard->transmission_equipment_id }}</td>
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
        @if($transmissionSite->transmission_line_board_wdm_trail->isNotEmpty())
            <div class="card border-success mb-3">
                <div class="card-header bg-gradient-gray-dark font-weight-bold">Line Board Wdm Trail Details</div>
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
                        @foreach($transmissionSite->transmission_line_board_wdm_trail as $lineBoardWdmTrail)
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
                                <td>{{ $lineBoardWdmTrail->transmission_line_board_id }}</td>
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
        @if($transmissionSite->transmission_mux_demux_board->isNotEmpty())
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
                            <th scope="col">SubRack Id</th>
                            <th scope="col">Site Id</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transmissionSite->transmission_mux_demux_board as $muxDemuxBoard)
                            <tr>
                                <th scope="row">{{ $muxDemuxBoard->id }}</th>
                                <td>{{ $muxDemuxBoard->board_name }}</td>
                                <td>{{ $muxDemuxBoard->slot_number }}</td>
                                <td>{{ $muxDemuxBoard->type }}</td>
                                <td>{{ $muxDemuxBoard->number_free_ports }}</td>
                                <td>{{ $muxDemuxBoard->number_used_ports }}</td>
                                <td>{{ $muxDemuxBoard->direction }}</td>
                                <td>{{ $muxDemuxBoard->transmission_equipment_id }}</td>
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
        @if($transmissionSite->transmission_otn_nes->isNotEmpty())
            <div class="card border-success mb-3">
                <div class="card-header bg-gradient-gray-dark font-weight-bold">NE Details</div>
                <div class="card-body text-black-50">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="bg-gradient-success">
                            <th scope="col">NE Id</th>
                            <th scope="col">NE Name</th>
                            <th scope="col">NE Type</th>
                            <th scope="col">NE Vendor</th>
                            <th scope="col">Site Id</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transmissionSite->transmission_otn_nes as $otnNe)
                            <tr>
                                <th scope="row">{{ $otnNe->id }}</th>
                                <td>{{ $otnNe->ne_name }}</td>
                                <td>{{ $otnNe->ne_type }}</td>
                                <td>{{ $otnNe->ne_vendor }}</td>
                                <td>{{ $otnNe->transmission_site_id }}</td>
                                <td>{{ $otnNe->created_at->format('Y-m-d') }}</td>
                                <td>{{ $otnNe->updated_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        @if($transmissionSite->transmission_otn_service->isNotEmpty())
            <div class="card border-success mb-3">
                <div class="card-header bg-gradient-gray-dark font-weight-bold">OTN Service Details</div>
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
                        @foreach($transmissionSite->transmission_otn_service as $otnService)
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
                                <td>{{ $otnService->transmission_client_board_id }}</td>
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
        @if($transmissionSite->transmission_roadm_board->isNotEmpty())
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
                            <th scope="col">SubRack Id</th>
                            <th scope="col">Site Id</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transmissionSite->transmission_roadm_board as $roadmBoard)
                            <tr>
                                <th scope="row">{{ $roadmBoard->id }}</th>
                                <td>{{ $roadmBoard->board_name }}</td>
                                <td>{{ $roadmBoard->slot_number }}</td>
                                <td>{{ $roadmBoard->type }}</td>
                                <td>{{ $roadmBoard->number_free_ports }}</td>
                                <td>{{ $roadmBoard->number_used_ports }}</td>
                                <td>{{ $roadmBoard->direction }}</td>
                                <td>{{ $roadmBoard->transmission_equipment_id }}</td>
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
        @if($transmissionSite->transmission_site_line_fiber->isNotEmpty())
            <div class="card border-success mb-3">
                <div class="card-header bg-gradient-gray-dark font-weight-bold">Line Fiber Details</div>
                <div class="card-body text-black-50">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="bg-gradient-success">
                            <th scope="col">Id</th>
                            <th scope="col">Direction Name</th>
                            <th scope="col">Cabling Method</th>
                            <th scope="col">Fiber Type</th>
                            <th scope="col">Core Number</th>
                            <th scope="col">Next Hope NE Id</th>
                            <th scope="col">Next Hope Distance</th>
                            <th scope="col">Ne Id</th>
                            <th scope="col">Site Id</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transmissionSite->transmission_site_line_fiber as $siteLine)
                            <tr>
                                <th scope="row">{{ $siteLine->id }}</th>
                                <td>{{ $siteLine->direction_name }}</td>
                                <td>{{ $siteLine->cabling_method }}</td>
                                <td>{{ $siteLine->fiber_type }}</td>
                                <td>{{ $siteLine->core_number }}</td>
                                <td>{{ $siteLine->next_hope_ne_id }}</td>
                                <td>{{ $siteLine->next_hope_distance }}</td>
                                <td>{{ $siteLine->transmission_otn_nes_id }}</td>
                                <td>{{ $siteLine->transmission_site_id }}</td>
                                <td>{{ $siteLine->created_at->format('Y-m-d') }}</td>
                                <td>{{ $siteLine->updated_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        <div class="text-right">
            <a href="{{route('transmission_site.index')}}" class="btn btn-outline-dark btn-lg nav-item mb-2"><i
                    class="fas fa-caret-left fa-2x"></i></a>
        </div>
    </div>
@endsection
