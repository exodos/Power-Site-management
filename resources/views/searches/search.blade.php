@extends('layouts.master')

@section('title')
    Search With Criteria
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card border-success mb-3">
            <div class="card-header bg-gradient-primary font-weight-bold">Search Site</div>
            <div class="card-body text-black-50">
                <form action="{{route('search')}}" method="get">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="ps_configuration">Power Source Configuration</label>
                                <select class="form-control form-control-lg mb-3" name="ps_configuration"
                                        id="ps_configuration">
                                    <option value="none" selected disabled hidden>Please Select</option>
                                    @foreach(\Illuminate\Support\Facades\DB::table('sites')->distinct()->orderBy('ps_configuration', 'ASC')->get(['ps_configuration']) as $psConfiguration)
                                        <option
                                            value="{{$psConfiguration->ps_configuration}}">{{$psConfiguration->ps_configuration}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="sites_region_zone">Sites Region Zone</label>
                                <select class="form-control form-control-lg mb-3" name="sites_region_zone"
                                        id="sites_region_zone">
                                    <option value="none" selected disabled hidden>Please Select</option>
                                    @foreach(\Illuminate\Support\Facades\DB::table('sites')->distinct()->orderBy('sites_region_zone', 'ASC')->get(['sites_region_zone']) as $regionZone)
                                        <option
                                            value="{{$regionZone->sites_region_zone}}">{{$regionZone->sites_region_zone}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="sites_political_region">Sites Political Region</label>
                                <select class="form-control form-control-lg mb-3" name="sites_political_region"
                                        id="sites_political_region">
                                    <option value="none" selected disabled hidden>Please Select</option>
                                    @foreach(\Illuminate\Support\Facades\DB::table('sites')->distinct()->orderBy('sites_political_region', 'ASC')->get(['sites_political_region']) as $politicalRegion)
                                        <option
                                            value="{{$politicalRegion->sites_political_region}}">{{$politicalRegion->sites_political_region}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="generator_type">Generator Type</label>
                                <select class="form-control form-control-lg mb-3" name="generator_type"
                                        id="generator_type">
                                    <option value="none" selected disabled hidden>Please Select</option>
                                    @foreach(\Illuminate\Support\Facades\DB::table('powers')->distinct()->orderBy('generator_type', 'ASC')->get(['generator_type']) as $generatorType)
                                        <option
                                            value="{{$generatorType->generator_type}}">{{$generatorType->generator_type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="generator_capacity">Generator Capacity</label>
                                <select class="form-control form-control-lg mb-3" name="generator_capacity"
                                        id="generator_capacity">
                                    <option value="none" selected disabled hidden>Please Select</option>
                                    @foreach(\Illuminate\Support\Facades\DB::table('powers')->distinct()->orderBy('generator_capacity', 'ASC')->get(['generator_capacity']) as $generatorCapacity)
                                        <option
                                            value="{{$generatorCapacity->generator_capacity}}">{{$generatorCapacity->generator_capacity}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="fuel_tanker_capacity">Fuel Tanker Capacity</label>
                                <input type="number" class="form-control" id="fuel_tanker_capacity"
                                       name="fuel_tanker_capacity" step="0.01">
                            </div>
                        </div>
                    </div>
                    <div class="container text-center">
                        <button class="btn btn-primary btn-lg" type="submit" id="search" name="search">Search</button>
                    </div>
                </form>
            </div>
        </div>
        @isset($_GET['search'])
            <div class="alert alert-danger">
                <ul class="list-group">
                    @empty($_GET['ps_configuration'])
                        <li class="list-group-item text-danger">
                            The power source configuration field is required.
                        </li>
                    @endempty
                    @empty($_GET['sites_region_zone'])
                        <li class="list-group-item text-danger">
                            The sites region zone field is required.
                        </li>
                    @endempty
                    @empty($_GET['sites_political_region'])
                        <li class="list-group-item text-danger">
                            The sites political region field is required.
                        </li>
                    @endempty
                    @empty($_GET['generator_type'])
                        <li class="list-group-item text-danger">
                            The generator type field is required.
                        </li>
                    @endempty
                    @empty($_GET['generator_capacity'])
                        <li class="list-group-item text-danger">
                            The generator capacity field is required!.
                        </li>
                    @endempty
                    @empty($_GET['fuel_tanker_capacity'])
                        <li class="list-group-item text-danger">
                            The fuel tanker capacity field is required!.
                        </li>
                    @endempty
                </ul>
            </div>
            @if(!empty($_GET['ps_configuration']) && !empty($_GET['sites_region_zone']) && !empty($_GET['sites_political_region']) && !empty($_GET['generator_type']) && !empty($_GET['generator_capacity']) && !empty($_GET['fuel_tanker_capacity']))
                <div class="card border-success mb-3">
                    <div class="card-header bg-gradient-primary font-weight-bold">Site Details</div>
                    <div class="card-body text-black-50">
                        @if($searchResults->isNotEmpty() )
                            <table class="table table-responsive table-bordered">
                                <thead>
                                <tr class="bg-gradient-primary">
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Power Source Configuration</th>
                                    <th scope="col">Monitoring Status</th>
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
                                    <th scope="col">Details</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($searchResults as $site)
                                    <tr>
                                        <th scope="row">{{ $site->site_id }}</th>
                                        <td>{{ $site->sites_name }}</td>
                                        <td>{{ $site->ps_configuration }}</td>
                                        <td>{{ $site->monitoring_status }}</td>
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
                                        <td>{{ $site->created_at}}</td>
                                        <td>{{ $site->updated_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-danger px-4" role="alert">
                                No results found for query {{ request()->query('search') }}
                            </div>
                        @endif
                    </div>
                </div>
                @if($searchResults->isNotEmpty() )
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
                                @foreach($searchResults as $power)
                                    <tr>
                                        <td>{{ $power->id }}</td>
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
            @endif
        @endisset
    </div>
@endsection
