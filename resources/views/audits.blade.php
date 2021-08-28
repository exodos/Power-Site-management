@extends('layouts.master')

@section('title')
    Audit Information
@endsection
{{--@section('sitemap')--}}
{{--    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>--}}
{{--    <li class="breadcrumb-item active"><a href="{{route('users.index')}}">Users</a></li>--}}
{{--@endsection--}}

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-xl-4 mb-3">
                <div class="sidebar px-4 py-md-0">
                    <form action="{{route('audits')}}" class="input-group" method="get">
                        <input type="text" class="form-control" name="search"
                               placeholder="Search By Employee Id, Action Or Event"
                               value="{{request()->query('search')}}">
                        <div class="input-group-addon">
                            <button id="search" type="button" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card border-dark mb-3">
            <div class="card-header bg-gradient-gray-dark font-weight-bold">Audit Information</div>
            <div class="card-body text-black-50">
                @if($audits->isNotEmpty())
                    <table class="table table-bordered">
                        <thead>
                        <tr class="bg-gradient-primary">
                            <th scope="col">Model</th>
                            <th scope="col">Employee Id</th>
                            <th scope="col">Action</th>
                            <th scope="col">Time</th>
                            <th scope="col">Old Value</th>
                            <th scope="col">New Values</th>
                            <th scope="col">Ip</th>
                            <th scope="col">Agent</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($audits as $audit)
                            <tr>

                                <td>{{ $audit->auditable_type }} (id: {{ $audit->auditable_id }})</td>
                                <td>{{ $audit->user_id }}</td>
                                <td>{{ $audit->event }}</td>
                                <td>{{ $audit->created_at }}</td>
                                <td>
                                    <table class="table">
                                        @foreach($audit->old_values as $attribute => $value)
                                            <tr>
                                                <td><b>{{ $attribute }}</b></td>
                                                <td>{{ $value }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </td>
                                <td>
                                    <table class="table">
                                        @foreach($audit->new_values as $attribute => $value)
                                            <tr>
                                                <td><b>{{ $attribute }}</b></td>
                                                <td>{{ $value }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </td>
                                <td>{{$audit->ip_address}}</td>
                                <td>{{$audit->user_agent}}</td>
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
                    {!! $audits->appends(['search' => request()->query('search')])->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
