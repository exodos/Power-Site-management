@extends('layouts.master')

@section('title')
    AirConditioners Information
@endsection

@section('sitemap')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('airconditioners.index')}}">Air Conditioner</a></li>
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
        @endif
        <div class="card border-primary mb-3">
            <div class="card-header font-weight-bold">Air Conditioners</div>
            <div class="card-body text-black-50">
                <table class="table table-bordered">
                    <thead>
                    <tr class="bg-primary">
                        <th scope="col">AirConditioner Id</th>
                        <th scope="col">AirConditioner Model</th>
                        <th scope="col">AirConditioner Capacity</th>
                        <th scope="col">Site Id</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($airconditioners as $airconditioner)
                        <tr>
                            <th scope="row">{{ $airconditioner->id }}</th>
                            <td>{{ $airconditioner->air_conditioners_model }}</td>
                            <td>{{ $airconditioner->air_conditioners_capacity }}</td>
                            <td>{{ $airconditioner->site_id }}</td>
                            <td>{{ $airconditioner->created_at }}</td>
                            <td>{{ $airconditioner->updated_at }}</td>
                            <td><a href="{{route('airconditioners.edit', $airconditioner->id)}}"
                                   class="btn btn-info btn-sm">Update</a></td>
                            <td>
                                <button class="btn btn-danger btn-sm" onclick="handleDelete({{$airconditioner->id}})">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $airconditioners->links() !!}
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
                            <h5 class="modal-title" id="deleteModalLabel">Delete Air Conditioners</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center text-danger font-weight-bold">
                                Are You Sure You Want To Delete This Air Conditioners ?
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
            form.action = '/airconditioners/' + id
            // console.log('deleting', form);
            $('#deleteModal').modal('show')
        }
    </script>
@endsection
