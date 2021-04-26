@extends('layouts.master')

@section('title')
    Site Information
@endsection
@section('sitemap')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('sites.index')}}">Sites</a></li>
@endsection

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
        @elseif(session()->has('unable'))
            <div class="alert alert-danger" role="alert">
                {{session()->get('unable')}}
            </div>
        @endif
        <div class="card border-primary mb-3">
            <div class="card-header font-weight-bold">Site Information</div>
            <div class="card-body text-black-50">
                <table class="table table-responsive table-bordered">
                    <thead>
                    <tr class="bg-primary">
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Latitude</th>
                        <th scope="col">Longitude</th>
                        <th scope="col">Region/Zone</th>
                        <th scope="col">Political Region</th>
                        <th scope="col">Category</th>
                        <th scope="col">Class</th>
                        <th scope="col">Value</th>
                        <th scope="col">Type</th>
                        <th scope="col">Configuration</th>
                        <th scope="col">Monitoring System Name</th>
                        <th scope="col">Commercial Power Line Voltage</th>
                        <th scope="col">STRA</th>
                        <th scope="col">Details</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sites as $site)
                        <tr>
                            <th scope="row">{{ $site->id }}</th>
                            <td>{{ $site->sites_name }}</td>
                            <td>{{ $site->sites_latitude }}</td>
                            <td>{{ $site->sites_longitude }}</td>
                            <td>{{ $site->sites_region_zone }}</td>
                            <td>{{ $site->sites_political_region }}</td>
                            <td>{{ $site->sites_category }}</td>
                            <td>{{ $site->sites_class }}</td>
                            <td>{{ $site->sites_value }}</td>
                            <td>{{ $site->sites_type }}</td>
                            <td>{{ $site->sites_configuration }}</td>
                            <td>{{ $site->monitoring_system_name }}</td>
                            <td>{{ $site->commercial_power_line_voltage }}</td>
                            <td>{{ $site->distance_maintenance_center }}</td>
                            <td><a href="{{route('sites.show', $site->id)}}" class="btn btn-primary btn-sm">Details</a>
                            </td>
                            <td>
                                @can('site-edit')
                                    <a href="{{route('sites.edit', $site->id)}}"
                                       class="btn btn-success btn-sm">Update</a>
                                @endcan
                            </td>
                            <td>
                                @can('site-delete')
                                    <button class="btn btn-danger btn-sm" onclick="handleDelete({{$site->id}})">
                                        Delete
                                    </button>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {!! $sites->links() !!}
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
