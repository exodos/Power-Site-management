@extends('layouts.master')

@section('title')
    Generators Information
@endsection

{{--@section('sitemap')--}}
{{--    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>--}}
{{--    <li class="breadcrumb-item active"><a href="{{route('batteries.index')}}">Batteries</a></li>--}}
{{--@endsection--}}

@section('content')
    <div class="container-fluid">
        @if(session()->has('success'))
            <div class="alert alert-success">
                <span style="font-size: 2em; color: #00a87d">
                    <i class="fas fa-info-circle"></i></span>
                {{session()->get('success')}}
            </div>
        @elseif(session()->has('updated'))
            <div class="alert alert-success">
                <span style="font-size: 2em; color: #00a87d">
                    <i class="fas fa-info-circle"></i></span>
                {{session()->get('updated')}}
            </div>
        @elseif(session()->has('deleted'))
            <div class="alert alert-danger">
                <span style="font-size: 2em; color: #ff0000">
                    <i class="fas fa-info-circle"></i></span>
                {{session()->get('deleted')}}
            </div>
        @elseif(session()->has('connection'))
            <div class="alert alert-danger">
                <span style="font-size: 2em; color: #ff0000">
                    <i class="fas fa-info-circle"></i></span>
                {{session()->get('connection')}}
            </div>
        @endif
        <div class="row">
            <div class="col-md-4 col-xl-3 mb-3">
{{--                <div class="sidebar px-4 py-md-0">--}}
                    <form action="{{route('powers.index')}}" class="input-group" method="get">
                        <input type="text" class="form-control" name="search"
                               placeholder="Search By Generator Id, Type Or Capacity"
                               value="{{request()->query('search')}}">
                        <div class="input-group-addon">
                            <button id="search" type="button" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
{{--                </div>--}}
            </div>
            <div class="col">
                @can('site-create')
                    <div class="text-right">
                        <a href="{{route('powers.create')}}"
                           class="btn btn-outline-dark mb-2"><i
                                class="fas fa-plus-square fa-2x"></i></a>
                    </div>
                @endcan
            </div>
        </div>
        <div class="card border-dark mb-3">
            <div class="card-header bg-gradient-gray-dark font-weight-bold">Generators</div>
            <div class="card-body text-black-50">
                @if($powers->isNotEmpty())
                    <table class="table table-bordered table-responsive border-primary">
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
                            <th scope="col">Site Id</th>
                            <th scope="col">Work Order Id</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            @can('site-edit')
                                <th scope="col">Update</th>
                            @endcan
                            @can('site-delete')
                                <th scope="col">Delete</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($powers as $power)
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
                                <td>{{ $power->site_id }}</td>
                                <td>{{$power->work_order_id}}</td>
                                <td>{{ $power->created_at->format('Y-m-d') }}</td>
                                <td>{{ $power->updated_at->format('Y-m-d') }}</td>
                                @can('site-edit')
                                    <td><a href="{{route('powers.edit', $power->id)}}"
                                           class="btn btn-primary btn-sm">Update</a></td>
                                @endcan
                                @can('site-delete')
                                    <td>
                                        <button class="btn btn-danger btn-sm"
                                                onclick="handleDelete({{$power->id}})">
                                            Delete
                                        </button>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-danger px-4" role="alert">
                        No results found for query {{ request()->query('search') }}
                    </div>
                @endif
                <div class="d-flex justify-content-center">
                    {!! $powers->appends(['search' => request()->query('search')])->links() !!}
                </div>
            </div>
        </div>
        <form action="" method="post" id="deleteForm">
        @csrf
        @method('DELETE')

        <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1"
                 aria-labelledby="deleteModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-gradient-danger">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Power</h5>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                    aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center text-danger font-weight-bold">
                                Are You Sure You Want To Delete This Power ?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">No, Go Back
                            </button>
                            <button type="submit" class="btn btn-danger">Yes, Delete
                            </button>
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
            form.action = '/powers/' + id
            // console.log('deleting', form);
            $('#deleteModal').modal('show')
        }

    </script>
@endsection





