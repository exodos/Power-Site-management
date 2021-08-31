@extends('layouts.master')

@section('title')
    Equipments Information
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
                <form action="{{route('equipment.index')}}" class="input-group" method="get">
                    <input type="text" class="form-control" name="search"
                           placeholder="Search By Equipment SubRack Id, SubRack Name Or SubRack Type"
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
                        <a href="{{route('equipment.create')}}" class="btn btn-outline-dark mb-2"><i
                                class="fas fa-plus-square fa-2x"></i></a>
                    </div>
                @endcan
            </div>
        </div>
        <div class="card border-dark mb-3">
            <div class="card-header bg-gradient-gray-dark font-weight-bold">Equipments</div>
            <div class="card-body text-black-50">
                @if($transmissionEquipments->isNotEmpty())
                    <table class="table table-bordered border-primary">
                        <thead>
                        <tr class="bg-gradient-success">
                            <th scope="col">Id</th>
                            <th scope="col">SubRack Name</th>
                            <th scope="col">SubRack Type</th>
                            <th scope="col">Equipment Type</th>
                            <th scope="col">Number Of Used Slots</th>
                            <th scope="col">Number Of Free Slots</th>
                            <th scope="col">Vendor</th>
                            <th scope="col">Ne Id</th>
                            <th scope="col">Site Id</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Details</th>
                            @can('transmission-edit')
                                <th scope="col">Update</th>
                            @endcan
                            @can('transmission-delete')
                                <th scope="col">Delete</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transmissionEquipments as $transmissionEquipment)
                            <tr>
                                <th scope="row">{{ $transmissionEquipment->id }}</th>
                                <td>{{ $transmissionEquipment->subrack_name }}</td>
                                <td>{{ $transmissionEquipment->subrack_type }}</td>
                                <td>{{ $transmissionEquipment->equipment_type }}</td>
                                <td>{{ $transmissionEquipment->number_used_slots }}</td>
                                <td>{{ $transmissionEquipment->number_free_slots }}</td>
                                <td>{{ $transmissionEquipment->vendor }}</td>
                                <td>{{ $transmissionEquipment->transmission_otn_nes_id }}</td>
                                <td>{{ $transmissionEquipment->transmission_site_id }}</td>
                                <td>{{ $transmissionEquipment->created_at->format('Y-m-d') }}</td>
                                <td>{{ $transmissionEquipment->updated_at->format('Y-m-d') }}</td>
                                <td>
                                    <a href="{{route('equipment.show', $transmissionEquipment->id)}}"
                                       class="btn btn-success btn-sm">Detail</a>
                                </td>
                                @can('transmission-edit')
                                    <td><a href="{{route('equipment.edit', $transmissionEquipment->id)}}"
                                           class="btn btn-primary btn-sm">Update</a></td>
                                @endcan
                                @can('transmission-delete')
                                    <td>
                                        <button class="btn btn-danger btn-sm"
                                                onclick="handleDelete({{$transmissionEquipment->id}})">
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
                    {!! $transmissionEquipments->appends(['search' => request()->query('search')])->links() !!}
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
                            <h5 class="modal-title" id="deleteModalLabel">Delete Equipments</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center text-danger font-weight-bold">
                                Are You Sure You Want To Delete This Equipments Data ?
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
            form.action = '/equipment/' + id
            // console.log('deleting', form);
            $('#deleteModal').modal('show')
        }
    </script>
@endsection