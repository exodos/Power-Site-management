@extends('layouts.master')

@section('title')
    OTN Services Information
@endsection

{{--@section('sitemap')--}}
{{--    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>--}}
{{--    <li class="breadcrumb-item active"><a href="{{route('airconditioners.index')}}">Air Conditioner</a></li>--}}
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
            <div class="col-md-4 col-xl-4">
                {{--                <div class="sidebar px-4 py-md-0">--}}
                <form action="{{route('otn_services.index')}}" class="input-group" method="get">
                    <input type="text" class="form-control" name="search"
                           placeholder="Search By Service Id, Name Or Customer Name"
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
                @can('transmission-create')
                    <div class="text-right">
                        <a href="{{route('otn_services.create')}}" class="btn btn-outline-dark mb-2"><i
                                class="fas fa-plus-square fa-2x"></i></a>
                    </div>
                @endcan
            </div>
        </div>
        <div class="card border-dark mb-3">
            <div class="card-header bg-gradient-gray-dark font-weight-bold">OTN Service</div>
            <div class="card-body text-black-50">
                @if($otnServices->isNotEmpty())
                    <table class="table table-bordered border-primary">
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
                            @can('transmission-edit')
                                <th scope="col">Update</th>
                            @endcan
                            @can('transmission-delete')
                                <th scope="col">Delete</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($otnServices as $otnService)
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
                                <td>{{ $otnService->transmission_client_boards_id }}</td>
                                <td>{{ $otnService->transmission_site_id }}</td>
                                <td>{{ $otnService->created_at->format('Y-m-d') }}</td>
                                <td>{{ $otnService->updated_at->format('Y-m-d') }}</td>
                                @can('transmission-edit')
                                    <td><a href="{{route('otn_services.edit', $otnService->id)}}"
                                           class="btn btn-primary btn-sm">Update</a></td>
                                @endcan
                                @can('transmission-delete')
                                    <td>
                                        <button class="btn btn-danger btn-sm"
                                                onclick="handleDelete({{$otnService->id}})">
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
                    {!! $otnServices->appends(['search' => request()->query('search')])->links() !!}
                    {{--                    {!! $airconditioners->appends(\Request::except('page'))->render() !!}--}}
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
                        <div class="modal-header bg-gradient-danger">
                            <h5 class="modal-title" id="deleteModalLabel">Delete OTN Service</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center text-danger font-weight-bold">
                                Are You Sure You Want To Delete This OTN Service Data ?
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
            form.action = '/otn_services/' + id
            // console.log('deleting', form);
            $('#deleteModal').modal('show')
        }
    </script>
@endsection
