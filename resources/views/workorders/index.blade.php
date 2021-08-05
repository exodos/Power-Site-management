@extends('layouts.master')

@section('title')
    Work Orders Information
@endsection
{{--@section('sitemap')--}}
{{--    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>--}}
{{--    <li class="breadcrumb-item active"><a href="{{route('workorders.index')}}">Index</a></li>--}}
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
                    <form action="{{route('workorders.index')}}" class="input-group" method="get">
                        <input type="text" class="form-control" name="search" placeholder="Search By Work Order Id Or Number">
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
                        <a href="{{route('workorders.create')}}" class="btn btn-outline-primary mb-2"><i
                                class="fas fa-plus-square fa-2x"></i></a>
                    </div>
                @endcanany
            </div>
        </div>
        <div class="card border-success mb-3">
            <div class="card-header bg-gradient-primary font-weight-bold">Work Orders</div>
            <div class="card-body text-black-50">
                @if($workorders->isNotEmpty())
                    <table class="table table-bordered">
                        <thead>
                        <tr class="bg-gradient-primary">
                            <th scope="col">Id</th>
                            <th scope="col">Work Order Number</th>
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
                        @foreach($workorders as $workorder)
                            <tr>
                                <th scope="row">{{ $workorder->id }}</th>
                                <td>{{ $workorder->work_orders_number }}</td>
                                <td>{{ $workorder->site_id }}</td>
                                <td>{{ $workorder->created_at->format('Y-m-d') }}</td>
                                <td>{{ $workorder->updated_at->format('Y-m-d') }}</td>
                                @canany(['site-create','site-edit','site-delete'])
                                    <td><a href="{{route('workorders.edit', $workorder->id)}}"
                                           class="btn btn-primary btn-sm">Update</a></td>
                                    <td>
                                        <button class="btn btn-danger btn-sm"
                                                onclick="handleDelete({{$workorder->id}})">
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
                    {!! $workorders->appends(['search' => request()->query('search')])->links() !!}
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
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Work Order</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center text-danger font-weight-bold">
                                Are You Sure You Want To Delete This Work Order ?
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
            form.action = '/workorders/' + id
            // console.log('deleting', form);
            $('#deleteModal').modal('show')
        }

    </script>
@endsection
