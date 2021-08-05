@extends('layouts.master')

@section('title')
    Towers Information
@endsection
{{--@section('sitemap')--}}
{{--    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>--}}
{{--    <li class="breadcrumb-item active"><a href="{{route('towers.index')}}">Towers</a></li>--}}
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
            <div class="col-md-4 col-xl-4 mb-3">
                <div class="sidebar px-4 py-md-0">
                    <form action="{{route('towers.index')}}" class="input-group" method="get">
                        <input type="text" class="form-control" name="search" placeholder="Search By Tower Id, Type Or Brand">
                        <div class="input-group-addon">
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
                        <a href="{{route('towers.create')}}" class="btn btn-outline-primary mb-2"><i
                                class="fas fa-plus-square fa-2x"></i></a>
                    </div>
                @endcanany
            </div>
        </div>
        <div class="card border-success mb-3">
            <div class="card-header bg-gradient-primary font-weight-bold">Tower</div>
            <div class="card-body text-black-50">
                @if($towers->isNotEmpty())
                    <table class="table table-bordered table-responsive">
                        <thead>
                        <tr class="bg-gradient-primary">
                            <th scope="col">Id</th>
                            <th scope="col">Tower Type</th>
                            <th scope="col">Tower Height</th>
                            <th scope="col">Tower Brand</th>
                            <th scope="col">Tower Soil Type</th>
                            <th scope="col">Tower Foundation Type</th>
                            <th scope="col">Tower Design Load Capacity</th>
                            <th scope="col">Tower Sharing Operator</th>
                            <th scope="col">Tower Used Load Capacity</th>
                            <th scope="col">Ethio Antenna Weight</th>
                            <th scope="col">Ethio Antenna Height</th>
                            <th scope="col">Operator Antenna Height</th>
                            <th scope="col">Operator Tower Load</th>
                            <th scope="col">Operator Antenna Weight</th>
                            <th scope="col">Tower Installation Date</th>
                            <th scope="col">Site Id</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            @canany(['site-create','site-edit','site-delete'])
                                <th scope="col">Update</th>
                                <th scope="col">Delete</th>
                            @endcanany
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($towers as $tower)
                            <tr>
                                <th scope="row">{{ $tower->id }}</th>
                                <td>{{ $tower->towers_type }}</td>
                                <td>{{ $tower->towers_height }}</td>
                                <td>{{ $tower->towers_brand }}</td>
                                <td>{{ $tower->towers_soil_type }}</td>
                                <td>{{ $tower->towers_foundation_type }}</td>
                                <td>{{ $tower->towers_design_load_capacity }}</td>
                                <td>{{ $tower->towers_sharing_operator }}</td>
                                <td>{{ $tower->tower_used_load_capacity }}</td>
                                <td>{{ $tower->ethio_antenna_weight }}</td>
                                <td>{{ $tower->ethio_antenna_height }}</td>
                                <td>{{ $tower->operator_antenna_height }}</td>
                                <td>{{ $tower->operator_tower_load }}</td>
                                <td>{{ $tower->operator_antenna_weight }}</td>
                                <td>{{ $tower->tower_installation_date }}</td>
                                <td>{{ $tower->site_id }}</td>
                                <td>{{ $tower->created_at->format('Y-m-d') }}</td>
                                <td>{{ $tower->updated_at->format('Y-m-d') }}</td>
                                @canany(['site-create','site-edit','site-delete'])
                                    <td><a href="{{route('towers.edit', $tower->id)}}"
                                           class="btn btn-primary btn-sm">Update</a></td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" onclick="handleDelete({{$tower->id}})">
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
                    {!! $towers->appends(['search' => request()->query('search')])->links() !!}
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
                            <h5 class="modal-title" id="deleteModalLabel">Delete Tower</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center text-danger font-weight-bold">
                                Are You Sure You Want To Delete This Tower ?
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
            form.action = '/towers/' + id
            // console.log('deleting', form);
            $('#deleteModal').modal('show')
        }

    </script>
@endsection
