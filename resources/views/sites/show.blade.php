@extends('layouts.master')

@section('title')
    Site Information
@endsection
@section('content')
    <div class="container-fluid">
        <div class="text-right">
            <a href="{{route('sites.index')}}" class="btn btn-outline-primary mb-1"><i
                    class="fas fa-caret-left fa-2x"></i></a>
        </div>
        <div class="card border-success mb-3">
            <div class="card-header bg-gradient-primary font-weight-bold">Site Details</div>
            <div class="card-body text-black-50">
                <table class="table table-bordered table-responsive">
                    <thead>
                    <tr class="bg-gradient-primary">
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Power Source Configuration</th>
                        <th scope="col">Latitude</th>
                        <th scope="col">Longitude</th>
                        <th scope="col">Region/Zone</th>
                        <th scope="col">Political Region</th>
                        <th scope="col">Location</th>
                        <th scope="col">Class</th>
                        <th scope="col">Value</th>
                        <th scope="col">Type</th>
                        <th scope="col">Maintenance Center</th>
                        <th scope="col">Distance From Mc</th>
                        <th scope="col">List Of NE</th>
                        <th scope="col">Number Of Towers</th>
                        <th scope="col">Number Of Generator</th>
                        <th scope="col">Number Of Air Conditioners</th>
                        <th scope="col">Number Of Rectifiers</th>
                        <th scope="col">Number Of Solar System</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">{{ $site->id }}</th>
                        <td>{{ $site->sites_name }}</td>
                        <td>{{ $site->ps_configuration }}</td>
                        <td>{{ $site->sites_latitude }}</td>
                        <td>{{ $site->sites_longitude }}</td>
                        <td>{{ $site->sites_region_zone }}</td>
                        <td>{{ $site->sites_political_region }}</td>
                        <td>{{ $site->sites_location }}</td>
                        <td>{{ $site->sites_class }}</td>
                        <td>{{ $site->sites_value }}</td>
                        <td>{{ $site->sites_type }}</td>
                        <td>{{ $site->maintenance_center }}</td>
                        <td>{{ $site->distance_mc }}</td>
                        <td>{{ $site->list_of_ne }}</td>
                        <td>{{ $site->number_of_towers }}</td>
                        <td>{{ $site->number_of_generator }}</td>
                        <td>{{ $site->number_of_airconditioners }}</td>
                        <td>{{ $site->number_of_rectifiers }}</td>
                        <td>{{ $site->number_of_solar_system }}</td>
                        <td>{{ $site->created_at }}</td>
                        <td>{{ $site->updated_at }}</td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
        @if($site->air_conditioners->isNotEmpty())
            <div class="card border-success mb-3">
                <div class="card-header bg-gradient-primary font-weight-bold">Air Conditioners Details</div>
                <div class="card-body text-black-50">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="bg-gradient-primary">
                            <th scope="col">Id</th>
                            <th scope="col">Air Conditioner Type</th>
                            <th scope="col">Air Conditioner Model</th>
                            <th scope="col">Air Conditioner Capacity</th>
                            <th scope="col">Functional Type</th>
                            <th scope="col">Gas Type</th>
                            <th scope="col">LLD Number</th>
                            <th scope="col">Commission Date</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($site->air_conditioners as $airconditioner)
                            <tr>
                                <th scope="row">{{ $airconditioner->id }}</th>
                                <td>{{ $airconditioner->air_conditioners_type }}</td>
                                <td>{{ $airconditioner->air_conditioners_model }}</td>
                                <td>{{ $airconditioner->air_conditioners_capacity }}</td>
                                <td>{{ $airconditioner->functional_type }}</td>
                                <td>{{ $airconditioner->gas_type }}</td>
                                <td>{{ $airconditioner->lld_number }}</td>
                                <td>{{ $airconditioner->commission_date }}</td>
                                <td>{{ $airconditioner->created_at }}</td>
                                <td>{{ $airconditioner->updated_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        @if($site->batteries->isNotEmpty())
            <div class="card border-success mb-3">
                <div class="card-header bg-gradient-primary font-weight-bold">Battery Details</div>
                <div class="card-body text-black-50">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="bg-gradient-primary">
                            <th scope="col">Id</th>
                            <th scope="col">Battery Type</th>
                            <th scope="col">Battery Model</th>
                            <th scope="col">Battery Voltage</th>
                            <th scope="col">Battery Capacity</th>
                            <th scope="col">Number Of Batteries Banks</th>
                            <th scope="col">Battery Holding Time</th>
                            <th scope="col">Commission Date</th>
                            <th scope="col">LLD Number</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($site->batteries as $battery)
                            <tr>
                                <th scope="row">{{ $battery->id }}</th>
                                <td>{{ $battery->batteries_type }}</td>
                                <td>{{ $battery->batteries_model }}</td>
                                <td>{{ $battery->batteries_voltage }}</td>
                                <td>{{ $battery->batteries_capacity }}</td>
                                <td>{{ $battery->number_of_batteries_banks }}</td>
                                <td>{{ $battery->battery_holding_time }}</td>
                                <td>{{ $battery->commission_date }}</td>
                                <td>{{ $battery->lld_number }}</td>
                                <td>{{ $battery->created_at }}</td>
                                <td>{{ $battery->updated_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        @if($site->powers->isNotEmpty())
            <div class="card border-success mb-3">
                <div class="card-header bg-gradient-primary font-weight-bold">Powers Source Details</div>
                <div class="card-body text-black-50">
                    <table class="table table-bordered table-responsive">
                        <thead>
                        <tr class="bg-gradient-primary">
                            <th scope="col">Id</th>
                            <th scope="col">Generator Type</th>
                            <th scope="col">Generator Capacity</th>
                            <th scope="col">Engine Model</th>
                            <th scope="col">Fuel Tanker Capacity</th>
                            <th scope="col">Alternator Model</th>
                            <th scope="col">Alternator Capacity</th>
                            <th scope="col">Controller Mode Model</th>
                            <th scope="col">ATS Model</th>
                            <th scope="col">ATS Capacity</th>
                            <th scope="col">Generator Foundation Size</th>
                            <th scope="col">Fuel Tank Foundation Size</th>
                            <th scope="col">Fuel Tanker Type</th>
                            <th scope="col">Fuel Tank Qty</th>
                            <th scope="col">Starter Battery Capacity</th>
                            <th scope="col">Starter Battery Type</th>
                            <th scope="col">Functional Status</th>
                            <th scope="col">DG Commission Date</th>
                            <th scope="col">DG LLD Number</th>
                            <th scope="col">Grid Power Line Voltage And Transformer Capacity
                            </th>
                            <th scope="col">Transformer Installation Date</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($site->powers as $power)
                            <tr>
                                <th scope="row">{{ $power->id }}</th>
                                <td>{{ $power->generator_type }}</td>
                                <td>{{ $power->generator_capacity }}</td>
                                <td>{{ $power->engine_model }}</td>
                                <td>{{ $power->fuel_tanker_capacity }}</td>
                                <td>{{ $power->alternator_model }}</td>
                                <td>{{ $power->alternator_capacity }}</td>
                                <td>{{ $power->controller_mode_model }}</td>
                                <td>{{ $power->ats_model }}</td>
                                <td>{{ $power->ats_capacity }}</td>
                                <td>{{ $power->generator_foundation_size }}</td>
                                <td>{{ $power->fuel_tank_foundation_size }}</td>
                                <td>{{ $power->fuel_tanker_type }}</td>
                                <td>{{ $power->fuel_tank_Qty }}</td>
                                <td>{{ $power->starter_battery_capacity }}</td>
                                <td>{{ $power->starter_battery_type }}</td>
                                <td>{{ $power->functionality_status }}</td>
                                <td>{{ $power->dg_commission_date }}</td>
                                <td>{{ $power->dg_lld_number }}</td>
                                <td>{{ $power->grid_power_line_voltage_and_transformer_capacity }}</td>
                                <td>{{ $power->transformer_installation_date }}</td>
                                <td>{{ $power->created_at }}</td>
                                <td>{{ $power->updated_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        @if($site->rectifiers->isNotEmpty())
            <div class="card border-success mb-3">
                <div class="card-header bg-gradient-primary font-weight-bold">Rectifier Details</div>
                <div class="card-body text-black-50">
                    <table class="table table-bordered table-responsive">
                        <thead>
                        <tr class="bg-gradient-primary">
                            <th scope="col">Id</th>
                            <th scope="col">Rectifier Model</th>
                            <th scope="col">Rectifier Capacity</th>
                            <th scope="col">Rectifiers Module Model</th>
                            <th scope="col">Number Of Rectifiers Model Slots</th>
                            <th scope="col">Rectifiers Module Capacity</th>
                            <th scope="col">Rectifier Module Qty</th>
                            <th scope="col">LLVD Capacity</th>
                            <th scope="col">BLVD Capacity</th>
                            <th scope="col">Battery Fuess Qty</th>
                            <th scope="col">Power Of MSAG/MSAN Connected Company</th>
                            <th scope="col">Monitoring System Name</th>
                            <th scope="col">LLD Number</th>
                            <th scope="col">Commission Date</th>
                            <th scope="col">Site Id</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($site->rectifiers as $rectifier)
                            <tr>
                                <th scope="row">{{ $rectifier->id }}</th>
                                <td>{{ $rectifier->rectifiers_model }}</td>
                                <td>{{ $rectifier->rectifiers_capacity }}</td>
                                <td>{{ $rectifier->rectifiers_module_model }}</td>
                                <td>{{ $rectifier->number_of_rectifiers_model_slots }}</td>
                                <td>{{ $rectifier->rectifiers_module_capacity }}</td>
                                <td>{{ $rectifier->rectifier_module_Qty }}</td>
                                <td>{{ $rectifier->llvd_capacity }}</td>
                                <td>{{ $rectifier->blvd_capacity }}</td>
                                <td>{{ $rectifier->battery_fuess_Qty }}</td>
                                <td>{{ $rectifier->power_of_msag_msan_connected_company }}</td>
                                <td>{{ $rectifier->monitoring_system_name }}</td>
                                <td>{{ $rectifier->lld_number }}</td>
                                <td>{{ $rectifier->commission_date }}</td>
                                <td>{{ $rectifier->site_id }}</td>
                                <td>{{ $rectifier->created_at->format('Y-m-d') }}</td>
                                <td>{{ $rectifier->updated_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        @if($site->solar_panels->isNotEmpty())
            <div class="card border-success mb-3">
                <div class="card-header bg-gradient-primary font-weight-bold">Solar Panels Details</div>
                <div class="card-body text-black-50">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="bg-gradient-primary">
                            <th scope="col">Id</th>
                            <th scope="col">Number Of Solar System</th>
                            <th scope="col">Solar Panel Type</th>
                            <th scope="col">Solar Panel Module Capacity</th>
                            <th scope="col">Number Of Arrays</th>
                            <th scope="col">Solar Controller Type</th>
                            <th scope="col">Regulator Capacity</th>
                            <th scope="col">Solar Regulator Qty</th>
                            <th scope="col">Number Of Structure Group</th>
                            <th scope="col">Solar Structure Front Height</th>
                            <th scope="col">Solar Structure Rear Height</th>
                            <th scope="col">Commission Date</th>
                            <th scope="col">Site Id</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($site->solar_panels as $solarpanel)
                            <tr>
                                <th scope="row">{{ $solarpanel->id }}</th>
                                <th scope="row">{{ $solarpanel->number_solar_system }}</th>
                                <td>{{ $solarpanel->solar_panel_type }}</td>
                                <td>{{ $solarpanel->solar_panels_module_capacity }}</td>
                                <td>{{ $solarpanel->number_of_arrays }}</td>
                                <td>{{ $solarpanel->solar_controller_type }}</td>
                                <td>{{ $solarpanel->regulator_capacity }}</td>
                                <td>{{ $solarpanel->solar_regulator_Qty }}</td>
                                <td>{{ $solarpanel->number_of_structure_group }}</td>
                                <td>{{ $solarpanel->solar_structure_front_height }}</td>
                                <td>{{ $solarpanel->solar_structure_rear_height }}</td>
                                <td>{{ $solarpanel->commission_date }}</td>
                                <td>{{ $solarpanel->site_id }}</td>
                                <td>{{ $solarpanel->created_at->format('Y-m-d') }}</td>
                                <td>{{ $solarpanel->updated_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        @if($site->towers->isNotEmpty())
            <div class="card border-success mb-3">
                <div class="card-header bg-gradient-primary font-weight-bold">Towers Details</div>
                <div class="card-body text-black-50">
                    <table class="table table-bordered table-responsive">
                        <thead>
                        <tr class="bg-gradient-primary">
                            <th scope="col">Id</th>
                            <th scope="col">Tower Type</th>
                            <th scope="col">Tower Height</th>
                            <th scope="col">Tower Brand</th>
                            <th scope="col">Tower Soil Type</th>
                            <th scope="col">Tower Foundation Type</th>
                            <th scope="col">Tower Design Load Capacity</th>
                            <th scope="col">Tower Sharing Operator</th>
                            <th scope="col">Tower Used Load Capacity</th>
                            <th scope="col">Ethio Antenna Weight</th>
                            <th scope="col">Ethio Antenna Height</th>
                            <th scope="col">Operator Antenna Height</th>
                            <th scope="col">Operator Tower Load</th>
                            <th scope="col">Operator Antenna Weight</th>
                            <th scope="col">Tower Installation Date</th>
                            <th scope="col">Site Id</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($site->towers as $tower)
                            <tr>
                                <th scope="row">{{ $tower->id }}</th>
                                <td>{{ $tower->towers_type }}</td>
                                <td>{{ $tower->towers_height }}</td>
                                <td>{{ $tower->towers_brand }}</td>
                                <td>{{ $tower->towers_soil_type }}</td>
                                <td>{{ $tower->towers_foundation_type }}</td>
                                <td>{{ $tower->towers_design_load_capacity }}</td>
                                <td>{{ $tower->towers_sharing_operator }}</td>
                                <td>{{ $tower->tower_used_load_capacity }}</td>
                                <td>{{ $tower->ethio_antenna_weight }}</td>
                                <td>{{ $tower->ethio_antenna_height }}</td>
                                <td>{{ $tower->operator_antenna_height }}</td>
                                <td>{{ $tower->operator_tower_load }}</td>
                                <td>{{ $tower->operator_antenna_weight }}</td>
                                <td>{{ $tower->tower_installation_date }}</td>
                                <td>{{ $tower->site_id }}</td>
                                <td>{{ $tower->created_at->format('Y-m-d') }}</td>
                                <td>{{ $tower->updated_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        @if($site->ups->isNotEmpty())
            <div class="card border-success mb-3">
                <div class="card-header bg-gradient-primary font-weight-bold">Ups Details</div>
                <div class="card-body text-black-50">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="bg-gradient-primary">
                            <th scope="col">Id</th>
                            <th scope="col">Ups Type</th>
                            <th scope="col">Ups Model</th>
                            <th scope="col">Ups Capacity</th>
                            <th scope="col">Input POB Type</th>
                            <th scope="col">Input POB Capacity</th>
                            <th scope="col">Number Of Ups Model</th>
                            <th scope="col">Battery Type</th>
                            <th scope="col">Numbers Of Battery Banks</th>
                            <th scope="col">Battery Capacity</th>
                            <th scope="col">Battery Holding Time</th>
                            <th scope="col">LLD Number</th>
                            <th scope="col">Commission Date</th>
                            <th scope="col">Site Id</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($site->ups as $ups)
                            <tr>
                                <th scope="row">{{ $ups->id }}</th>
                                <td>{{ $ups->ups_type }}</td>
                                <td>{{ $ups->ups_model }}</td>
                                <td>{{ $ups->ups_capacity }}</td>
                                <td>{{ $ups->input_pob_type }}</td>
                                <td>{{ $ups->input_pob_capacity }}</td>
                                <td>{{ $ups->number_of_ups_model }}</td>
                                <td>{{ $ups->battery_type }}</td>
                                <td>{{ $ups->numbers_of_battery_banks }}</td>
                                <td>{{ $ups->battery_capacity }}</td>
                                <td>{{ $ups->battery_holding_time }}</td>
                                <td>{{ $ups->lld_number }}</td>
                                <td>{{ $ups->commission_date }}</td>
                                <td>{{ $ups->site_id }}</td>
                                <td>{{ $ups->created_at->format('Y-m-d') }}</td>
                                <td>{{ $ups->updated_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        @if($site->work_orders->isNotEmpty())
            <div class="card border-success mb-3">
                <div class="card-header bg-gradient-primary font-weight-bold">Work Orders Details</div>
                <div class="card-body text-black-50">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="bg-gradient-primary">
                            <th scope="col">Id</th>
                            <th scope="col">Work Order Number</th>
                            <th scope="col">Site Id</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($site->work_orders as $workorder)
                            <tr>
                                <th scope="row">{{ $workorder->id }}</th>
                                <td>{{ $workorder->work_orders_number }}</td>
                                <td>{{ $workorder->site_id }}</td>
                                <td>{{ $workorder->created_at->format('Y-m-d') }}</td>
                                <td>{{ $workorder->updated_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        <div class="text-right">
            <a href="{{route('sites.index')}}" class="btn btn-outline-info btn-lg nav-item mb-2"><i
                    class="fas fa-caret-left fa-2x"></i></a>
        </div>
    </div>
@endsection
