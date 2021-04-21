@extends('layouts.master')

@section('title')
    Site Information
@endsection
@section('content')
    <div class="container-fluid">
        <div class="text-right">
            <a href="{{route('sites.index')}}" class="btn btn-outline-info btn-lg nav-item mb-2"><i
                    class="fas fa-caret-left"></i>
                Back</a>
        </div>
        <div class="card border-primary mb-3">
            <div class="card-header font-weight-bold">Site Details</div>
            <div class="card-body text-black-50">
                <table class="table table-bordered">
                    <thead>
                    <tr class="bg-primary">
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Latitude</th>
                        <th scope="col">Longitude</th>
                        <th scope="col">Region/Zone</th>
                        <th scope="col">Political Region</th>
                        <th scope="col">Category</th>
                        <th scope="col">Class</th>
                        <th scope="col">Value</th>
                        <th scope="col">Type</th>
                        <th scope="col">Configuration</th>
                        <th scope="col">Monitoring System Name</th>
                        <th scope="col">Commercial Power Line Voltage</th>
                        <th scope="col">STRA</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$site->id}}</td>
                        <td>{{$site->sites_name}}</td>
                        <td>{{ $site->sites_latitude }}</td>
                        <td>{{ $site->sites_longitude }}</td>
                        <td>{{ $site->sites_region_zone }}</td>
                        <td>{{ $site->sites_political_region }}</td>
                        <td>{{ $site->sites_category }}</td>
                        <td>{{ $site->sites_class }}</td>
                        <td>{{ $site->sites_value }}</td>
                        <td>{{ $site->sites_type }}</td>
                        <td>{{ $site->sites_configuration }}</td>
                        <td>{{ $site->monitoring_system_name }}</td>
                        <td>{{ $site->commercial_power_line_voltage }}</td>
                        <td>{{ $site->distance_maintenance_center }}</td>
                        <td>{{ $site->created_at }}</td>
                        <td>{{ $site->updated_at }}</td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="card border-primary mb-3">
            <div class="card-header font-weight-bold">Air Conditioners Details</div>
            <div class="card-body text-black-50">
                <table class="table table-bordered">
                    <thead>
                    <tr class="bg-primary">
                        <th scope="col">Id</th>
                        <th scope="col">Air Conditioner Model</th>
                        <th scope="col">Air ConditionerCapacity</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($site->air_conditioners as $air_conditioner)
                        <tr>
                            <td>{{$air_conditioner->id}}</td>
                            <td>{{$air_conditioner->air_conditioners_model}}</td>
                            <td>{{$air_conditioner->air_conditioners_capacity }}</td>
                            <td>{{$air_conditioner->created_at }}</td>
                            <td>{{$air_conditioner->updated_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card border-primary mb-3">
            <div class="card-header font-weight-bold">Battery Details</div>
            <div class="card-body text-black-50">
                <table class="table table-bordered">
                    <thead>
                    <tr class="bg-primary">
                        <th scope="col">Id</th>
                        <th scope="col">Battery Model</th>
                        <th scope="col">Number Of Battery Model Group</th>
                        <th scope="col">Battery Capacity</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($site->batteries as $battery)
                        <tr>
                            <td>{{$battery->id}}</td>
                            <td>{{$battery->batteries_model}}</td>
                            <td>{{ $battery->number_of_batteries_group }}</td>
                            <td>{{ $battery->batteries_capacity }}</td>
                            <td>{{ $battery->created_at }}</td>
                            <td>{{ $battery->updated_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card border-primary mb-3">
            <div class="card-header font-weight-bold">Powers Details</div>
            <div class="card-body text-black-50">
                <table class="table table-bordered">
                    <thead>
                    <tr class="bg-primary">
                        <th scope="col">Id</th>
                        <th scope="col">Powers Type</th>
                        <th scope="col">Dg Model</th>
                        <th scope="col">Dg Capacity Type (kva)</th>
                        <th scope="col">Fuel Tanker Capacity</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($site->powers as $powers)
                        <tr>
                            <td>{{$powers->id}}</td>
                            <td>{{$powers->powers_type}}</td>
                            <td>{{ $powers->dg_model }}</td>
                            <td>{{ $powers->dg_capacity }}</td>
                            <td>{{ $powers->fuel_tanker_capacity }}</td>
                            <td>{{$powers->created_at }}</td>
                            <td>{{$powers->updated_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card border-primary mb-3">
            <div class="card-header font-weight-bold">Rectifier Details</div>
            <div class="card-body text-black-50">
                <table class="table table-bordered">
                    <thead>
                    <tr class="bg-primary">
                        <th scope="col">Id</th>
                        <th scope="col">Model</th>
                        <th scope="col">Number Of Rectifiers</th>
                        <th scope="col">Rectifiers Capacity</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($site->rectifiers as $rectifiers)
                        <tr>
                            <td>{{$rectifiers->id}}</td>
                            <td>{{$rectifiers->rectifiers_model}}</td>
                            <td>{{ $rectifiers->number_of_rectifiers}}</td>
                            <td>{{ $rectifiers->rectifiers_capacity}}</td>
                            <td>{{ $rectifiers->created_at }}</td>
                            <td>{{ $rectifiers->updated_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card border-primary mb-3">
            <div class="card-header font-weight-bold">Solar Panels Details</div>
            <div class="card-body text-black-50">
                <table class="table table-bordered">
                    <thead>
                    <tr class="bg-primary">
                        <th scope="col">Id</th>
                        <th scope="col">Solar Panels Number</th>
                        <th scope="col">Solar Panels Capacity</th>
                        <th scope="col">Solar Panels Regulatory Model</th>
                        <th scope="col">Solar Panels Module Capacity</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($site->solar_panels as $solar_panels)
                        <tr>
                            <td>{{$solar_panels->id}}</td>
                            <td>{{$solar_panels->solar_panels_number}}</td>
                            <td>{{ $solar_panels->solar_panels_capacity}}</td>
                            <td>{{ $solar_panels->solar_panels_regulatory_model}}</td>
                            <td>{{ $solar_panels->solar_panels_module_capacity}}</td>
                            <td>{{ $solar_panels->created_at }}</td>
                            <td>{{ $solar_panels->updated_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card border-primary mb-3">
            <div class="card-header font-weight-bold">Towers Details</div>
            <div class="card-body text-black-50">
                <table class="table table-bordered">
                    <thead>
                    <tr class="bg-primary">
                        <th scope="col">Id</th>
                        <th scope="col">Towers Brand</th>
                        <th scope="col">Towers Height (m)</th>
                        <th scope="col">Towers Load Capacity (<span>&#13217;</span>)</th>
                        <th scope="col">Towers Sharing Operators</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($site->towers as $towers)
                        <tr>
                            <td>{{$towers->id}}</td>
                            <td>{{$towers->towers_brand}}</td>
                            <td>{{$towers->towers_height}}</td>
                            <td>{{$towers->towers_load_capacity}}</td>
                            <td>{{$towers->towers_sharing_operator}}</td>
                            <td>{{$towers->created_at }}</td>
                            <td>{{$towers->updated_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card border-primary mb-3">
            <div class="card-header font-weight-bold">Ups Details</div>
            <div class="card-body text-black-50">
                <table class="table table-bordered">
                    <thead>
                    <tr class="bg-primary">
                        <th scope="col">Id</th>
                        <th scope="col">Ups Model</th>
                        <th scope="col">Ups Capacity</th>
                        <th scope="col">Number Of Ups Model</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($site->ups as $ups)
                        <tr>
                            <td>{{$ups->id}}</td>
                            <td>{{$ups->ups_model}}</td>
                            <td>{{$ups->ups_capacity}}</td>
                            <td>{{$ups->number_of_ups_model}}</td>
                            <td>{{$ups->created_at }}</td>
                            <td>{{$ups->updated_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card border-primary mb-3">
            <div class="card-header font-weight-bold">Work Orders Details</div>
            <div class="card-body text-black-50">
                <table class="table table-bordered">
                    <thead>
                    <tr class="bg-primary">
                        <th scope="col">Id</th>
                        <th scope="col">Work Orders Number</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($site->work_orders as $work_orders)
                        <tr>
                            <td>{{$work_orders->id}}</td>
                            <td>{{$work_orders->work_orders_number}}</td>
                            <td>{{$work_orders->created_at }}</td>
                            <td>{{$work_orders->updated_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
