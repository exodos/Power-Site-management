@extends('layouts.master')

@section('title')
    Ups Information
@endsection
{{--@section('sitemap')--}}
{{--    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>--}}
{{--    <li class="breadcrumb-item active"><a href="{{route('ups.index')}}">Ups</a></li>--}}
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
            <div class="col-md-4 col-xl-4 mb-3">
                {{--                <div class="sidebar px-4 py-md-0">--}}
                <form action="{{route('ups.index')}}" class="input-group" method="get">
                    <input type="text" class="form-control" name="search"
                           placeholder="Search By Ups Id, Type Or Model">
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
                        <a href="{{route('ups.create')}}" class="btn btn-outline-dark mb-2"><i
                                class="fas fa-plus-square fa-2x"></i></a>
                    </div>
                @endcan
            </div>
        </div>
        <div class="card border-dark mb-3">
            <div class="card-header bg-gradient-gray-dark font-weight-bold">Ups</div>
            <div class="card-body text-black-50">
                @if($upss->isNotEmpty())
                    <table class="table table-bordered table-responsive border-primary">
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
                        @foreach($upss as $ups)
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
                                <td>{{$ups->work_order_id}}</td>
                                <td>{{ $ups->created_at->format('Y-m-d') }}</td>
                                <td>{{ $ups->updated_at->format('Y-m-d') }}</td>
                                @can('site-edit')
                                    <td><a href="{{route('ups.edit', $ups->id)}}"
                                           class="btn btn-primary btn-sm">Update</a>
                                    </td>
                                @endcan
                                @can('site-delete')
                                    <td>
                                        <button class="btn btn-danger btn-sm" onclick="handleDelete({{$ups->id}})">
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
                    {!! $upss->appends(['search' => request()->query('search')])->links() !!}
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
                            <h5 class="modal-title" id="deleteModalLabel">Delete Ups</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center text-danger font-weight-bold">
                                Are You Sure You Want To Delete This Ups ?
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
            form.action = '/ups/' + id
            // console.log('deleting', form);
            $('#deleteModal').modal('show')
        }

    </script>
@endsection
