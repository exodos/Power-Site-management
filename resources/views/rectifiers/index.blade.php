@extends('layouts.master')

@section('title')
    Rectifiers Information
@endsection

{{--@section('sitemap')--}}
{{--    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>--}}
{{--    <li class="breadcrumb-item active"><a href="{{route('rectifiers.index')}}">Rectifiers</a></li>--}}
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
        @endif
        <div class="row">
            <div class="col-md-3 col-xl-4 mb-3">
                <div class="sidebar px-4 py-md-0">
                    <form action="{{route('rectifiers.index')}}" class="input-group" method="get">
                        <input type="text" class="form-control" name="search"
                               placeholder="Search By Rectifier Id, Model Or Capacity"
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
                        <a href="{{route('rectifiers.create')}}" class="btn btn-outline-primary mb-2"><i
                                class="fas fa-plus-square fa-2x"></i></a>
                    </div>
                @endcanany
            </div>
        </div>
    </div>
    <div class="card border-success mb-3">
        <div class="card-header bg-gradient-primary font-weight-bold">Rectifier</div>
        <div class="card-body text-black-50">
            @if($rectifiers->isNotEmpty())
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
                        <th scope="col">Work Order Id</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        @canany(['site-create','site-edit','site-delete'])
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                        @endcanany
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rectifiers as $rectifier)
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
                            <td>{{$rectifier->work_order_id}}</td>
                            <td>{{ $rectifier->created_at->format('Y-m-d') }}</td>
                            <td>{{ $rectifier->updated_at->format('Y-m-d') }}</td>
                            @canany(['site-create','site-edit','site-delete'])
                                <td><a href="{{route('rectifiers.edit', $rectifier->id)}}"
                                       class="btn btn-primary btn-sm">Update</a></td>
                                <td>
                                    <button class="btn btn-danger btn-sm" onclick="handleDelete({{$rectifier->id}})">
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
            <div class="d-flex justify-content-center">
                {!! $rectifiers->appends(['search' => request()->query('search')])->links() !!}
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
                        <h5 class="modal-title" id="deleteModalLabel">Delete Rectifier</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center text-danger font-weight-bold">
                            Are You Sure You Want To Delete This Rectifier ?
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
            form.action = '/rectifiers/' + id
            // console.log('deleting', form);
            $('#deleteModal').modal('show')
        }

    </script>
@endsection
