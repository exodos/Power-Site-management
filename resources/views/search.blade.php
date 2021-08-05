@extends('layouts.master')

@section('title')
    Search Information
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card border-primary mb-3">
            <div class="card-header font-weight-bold">Search Site</div>
            <div class="card-body text-black-50">
                <form action="{{route('search')}}" method="get">
                    @csrf
                    <div class="form-group">
                        <label for="ps_configuration">Power Source Configuration</label>
                        <select class="form-control form-control-lg mb-3" name="ps_configuration"
                                id="ps_configuration">
                            <option value="none" selected disabled hidden>Please Select</option>
                            @foreach($ps_configuration as $sc)
                                <option
                                    value="{{request()->query('ps_configuration_search')}}">{{$sc->ps_configuration}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sites_region_zone">Sites Region Zone</label>
                        <select class="form-control form-control-lg mb-3" name="sites_region_zone"
                                id="sites_region_zone">
                            <option value="none" selected disabled hidden>Please Select</option>
                            @foreach($sites_region_zone as $sr)
                                <option
                                    value="{{request()->query('sites_region_zone_search')}}">{{$sr->sites_region_zone}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sites_political_region">Sites Political Region</label>
                        <select class="form-control form-control-lg mb-3" name="sites_political_region"
                                id="sites_political_region">
                            <option value="none" selected disabled hidden>Please Select</option>
                            @foreach($sites_political_region as $pr)
                                <option
                                    value="{{request()->query('sites_political_region_search')}}">{{$pr->sites_political_region}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="generator_type">Generator Type</label>
                        <select class="form-control form-control-lg mb-3" name="generator_type"
                                id="generator_type">
                            <option value="none" selected disabled hidden>Please Select</option>
                            @foreach($generator_type as $gt)
                                <option
                                    value="{{request()->query('generator_type_search')}}">{{$gt->generator_type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="generator_capacity">Generator Capacity</label>
                        <select class="form-control form-control-lg mb-3" name="generator_capacity"
                                id="generator_capacity">
                            <option value="none" selected disabled hidden>Please Select</option>
                            @foreach($generator_capacity as $gc)
                                <option
                                    value="{{request()->query('generator_capacity_search')}}">{{$gc->generator_capacity}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fuel_tanker_capacity">Fuel Tanker Capacity</label>
                        <input type="number" class="form-control" id="fuel_tanker_capacity"
                               name="fuel_tanker_capacity" step="0.01"
                               value="{{request()->query('fuel_tanker_capacity_search')}}">
                    </div>
                    <div class="container text-center">
                        <button class="btn btn-primary btn-lg">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

{{--    @if($sites->isNotEmpty())--}}
        <div class="card border-primary mb-3">
            <div class="card-header font-weight-bold">Search Result</div>
            <div class="card-body text-black-50">
                <table class="table table-responsive table-bordered">
                    <thead>
                    <tr class="bg-primary">
                        <th scope="col">Site Id</th>
                        <th scope="col">Site Name</th>
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
                    @foreach($sites as $site)
                        <tr>
                            <th scope="row">{{ $site->id }}</th>
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
                            <td>{{ $site->created_at->format('Y-m-d') }}</td>
                            <td>{{ $site->updated_at->format('Y-m-d') }}</td>
                            <td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
{{--    @endif--}}

@endsection
