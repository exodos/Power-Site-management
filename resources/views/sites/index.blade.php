@extends('layouts.master')

@section('title')
    Site Information
@endsection
{{--@section('sitemap')--}}
{{--    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>--}}
{{--    <li class="breadcrumb-item active"><a href="{{route('sites.index')}}">Sites</a></li>--}}
{{--@endsection--}}

@section('content')

    <div class="container-fluid">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{session()->get('success')}}
            </div>
        @elseif(session()->has('updated'))
            <div class="alert alert-success">
                {{session()->get('updated')}}
            </div>
        @elseif(session()->has('deleted'))
            <div class="alert alert-danger">
                {{session()->get('deleted')}}
            </div>
        @elseif(session()->has('connection'))
            <div class="alert alert-danger">
                {{session()->get('connection')}}
            </div>
        @elseif(session()->has('unable'))
            <div class="alert alert-danger" role="alert">
                {{session()->get('unable')}}
            </div>
        @endif
        <div class="row">
            <div class="col-md-3 col-xl-5 mb-3">
                <div class="sidebar px-4 py-md-0">
                    <form action="{{route('sites.index')}}" class="input-group" method="get">
                        <input type="text" class="form-control" name="search"
                               placeholder="Search By Id, Name, Power Source Configuration Or Monitoring Status"
                               value="{{request()->query('search')}}">
                        <div class="input-group-addon">
                            {{--                            <span class="input-group-text"><i class="fas fa-search"></i></span>--}}
                            <button id="search" type="button" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col">
                @canany(['site-create','site-edit','site-delete'])
                    <div class="text-right">
                        <a href="{{route('sites.create')}}" class="btn btn-outline-primary mb-2"><i
                                class="fas fa-plus-square fa-2x"></i></a>
                    </div>
                @endcanany
            </div>
        </div>
        <div class="card border-success mb-3">
            <div class="card-header bg-gradient-primary font-weight-bold">Site Information</div>
            <div class="card-body text-black-50">
                @if($sites->isNotEmpty())
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
                            <th scope="col">Number Of Down Links</th>
                            <th scope="col">Work Order Id</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Detail</th>
                            @canany(['site-create','site-edit','site-delete'])
                                <th scope="col">Update</th>
                                <th scope="col">Delete</th>
                            @endcanany
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
                                <td>{{$site->number_of_down_links}}</td>
                                <td>{{$site->work_order_id}}</td>
                                <td>{{ $site->created_at->format('Y-m-d') }}</td>
                                <td>{{ $site->updated_at->format('Y-m-d') }}</td>
                                <td>
                                    <a href="{{route('sites.show', $site->id)}}"
                                       class="btn btn-success btn-sm">Detail</a>
                                </td>
                                @canany(['site-create','site-edit','site-delete'])
                                    <td><a href="{{route('sites.edit', $site->id)}}"
                                           class="btn btn-primary btn-sm">Update</a></td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" onclick="handleDelete({{$site->id}})">
                                            Delete
                                        </button>
                                    </td>
                                @endcanany
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
            <div class="d-flex justify-content-center">
                {!! $sites->appends(['search' => request()->query('search')])->links() !!}
            </div>
        </div>
        <form action="" method="post" id="deleteForm">
        @csrf
        @method('DELETE')

        <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Sites</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center text-danger font-weight-bold">
                                Are You Sure You Want To Delete This Site ?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Go Back</button>
                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        function handleDelete(id) {
            var form = document.getElementById('deleteForm')
            form.action = '/sites/' + id
            // console.log('deleting', form);
            $('#deleteModal').modal('show')
        }

    </script>
@endsection
