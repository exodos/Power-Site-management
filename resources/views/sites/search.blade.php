@extends('layouts.master')

@section('title')
    Simple Site Search
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card border-success mb-3">
            <div class="card-header bg-gradient-primary font-weight-bold">Search Site</div>
            <div class="card-body text-black-50">
                <form action="{{route('sites.search')}}" method="get">
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
                    </div>
                    <div class="container text-center">
                        <button class="btn btn-primary btn-lg" type="submit" id="search" name="search">Search</button>
                    </div>
                </form>
            </div>
        </div>
        @isset($_GET['search'])
            @if(empty($_GET['ps_configuration']) && empty($_GET['sites_region_zone']) && empty($_GET['sites_political_region']))
                <div class="alert alert-danger" role="alert">
                    <h5>Please Select One Of The Fields To Search!!</h5>
                </div>
            @elseif(!empty($_GET['ps_configuration']) && empty($_GET['sites_region_zone']) || empty($_GET['sites_political_region']))
                <div class="card border-success mb-3">
                    <div class="card-header bg-gradient-primary font-weight-bold">Search Results</div>
                    <div class="card-body text-black-50">
                        @if($data->isNotEmpty() )
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
                                    <th scope="col">Work Order Id</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Updated At</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $site)
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
                                        <td>{{$site->work_order_id}}</td>
                                        <td>{{ $site->created_at}}</td>
                                        <td>{{ $site->updated_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-danger px-4" role="alert">
                                <ul class="list-group">
                                    <li class="list-group-item text-danger">
                                        No results found for query {{ request()->query('ps_configuration') }}
                                    </li>
                                </ul>
                            </div>
                    </div>
                </div>
            @endif
            <div class="d-flex justify-content-center">
                {!! $data->appends(['search' => request()->query('ps_configuration')])->links() !!}
            </div>
        @elseif(!empty($_GET['ps_configuration']) && !empty($_GET['sites_region_zone']) || empty($_GET['sites_political_region']))
            <div class="card border-success mb-3">
                <div class="card-header bg-gradient-primary font-weight-bold">Search Results</div>
                <div class="card-body text-black-50">
                    @if($data->isNotEmpty() )
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
                                <th scope="col">Work Order Id</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Updated At</th>
                                <th scope="col">Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $site)
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
                                    <td>{{$site->work_order_id}}</td>
                                    <td>{{ $site->created_at}}</td>
                                    <td>{{ $site->updated_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-danger px-4" role="alert">
                            <ul class="list-group">
                                <li class="list-group-item text-danger">
                                    No results found for query {{ request()->query('ps_configuration') }}
                                    and {{request()->query('sites_region_zone')}}
                                </li>
                            </ul>
                        </div>
                </div>
            </div>
        @endif
        <div class="d-flex justify-content-center">
            {!! $data->appends(['search' => request()->query('ps_configuration'), 'search'=>request()->query('sites_region_zone')])->links() !!}
        </div>
        @elseif(!empty($_GET['ps_configuration']) && !empty($_GET['sites_region_zone']) || !empty($_GET['sites_political_region']))
            <div class="card border-success mb-3">
                <div class="card-header bg-gradient-primary font-weight-bold">Search Results</div>
                <div class="card-body text-black-50">
                    @if($data->isNotEmpty() )
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
                                <th scope="col">Work Order Id</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Updated At</th>
                                <th scope="col">Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $site)
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
                                    <td>{{$site->work_order_id}}</td>
                                    <td>{{ $site->created_at}}</td>
                                    <td>{{ $site->updated_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-danger px-4" role="alert">
                            <ul class="list-group">
                                <li class="list-group-item text-danger">
                                    No results found for query {{ request()->query('ps_configuration') }}
                                    , {{request()->query('sites_region_zone')}}
                                    And {{request()->query('sites_political_region')}}
                                </li>
                            </ul>
                        </div>
                </div>
            </div>
        @endif
        <div class="d-flex justify-content-center">
            {!! $data->appends(['search' => request()->query('ps_configuration'),'search'=>request()->query('sites_region_zone'),'search'=>request()->query('sites_political_region')])->links() !!}
        </div>
        @elseif(empty($_GET['ps_configuration']) && !empty($_GET['sites_region_zone']) || empty($_GET['sites_political_region']))
        @endif
        @endisset
    </div>
@endsection
