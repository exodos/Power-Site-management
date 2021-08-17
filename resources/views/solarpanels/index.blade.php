@extends('layouts.master')

@section('title')
    Solar Panels Information
@endsection

{{--@section('sitemap')--}}
{{--    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>--}}
{{--    <li class="breadcrumb-item active"><a href="{{route('solarpanels.index')}}">Solar Panel</a></li>--}}
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
            <div class="col-md-3 col-xl-4 mb-3">
                <div class="sidebar px-4 py-md-0">
                    <form action="{{route('solarpanels.index')}}" class="input-group" method="get">
                        <input type="text" class="form-control" name="search" placeholder="Search By Id, Number Of Solar System Or Solar Panel Type"
                               value="{{request()->query('search')}}">
                        <div class="input-group-addon">
                            <button id="search" type="button" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col">
                @can('site-create')
                    <div class="text-right">
                        <a href="{{route('solarpanels.create')}}" class="btn btn-outline-dark mb-2"><i
                                class="fas fa-plus-square fa-2x"></i></a>
                    </div>
                @endcan
            </div>
        </div>
        <div class="card border-dark mb-3">
            <div class="card-header bg-gradient-gray-dark font-weight-bold">Solar Panel</div>
            <div class="card-body text-black-50">
                @if($solarpanels->isNotEmpty())
                    <table class="table table-bordered table-responsive border-primary">
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
                        @foreach($solarpanels as $solarpanel)
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
                                <td>{{$solarpanel->work_order_id}}</td>
                                <td>{{ $solarpanel->created_at->format('Y-m-d') }}</td>
                                <td>{{ $solarpanel->updated_at->format('Y-m-d') }}</td>
                                @can('site-edit')
                                    <td><a href="{{route('solarpanels.edit', $solarpanel->id)}}"
                                           class="btn btn-primary btn-sm">Update</a>
                                    </td>
                                @endcan
                                @can('site-delete')
                                    <td>
                                        <button class="btn btn-danger btn-sm"
                                                onclick="handleDelete({{$solarpanel->id}})">
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
                    {!! $solarpanels->appends(['search' => request()->query('search')])->links() !!}
                </div>
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
                            <h5 class="modal-title" id="deleteModalLabel">Delete Solar Panels</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center text-danger font-weight-bold">
                                Are You Sure You Want To Delete This Solar Panels ?
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
            form.action = '/solarpanels/' + id
            // console.log('deleting', form);
            $('#deleteModal').modal('show')
        }

    </script>
@endsection
