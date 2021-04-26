@extends('layouts.master')

@section('title')
    Role Information
@endsection
@section('content')
    <div class="container-fluid">
        <div class="text-right">
            <a href="{{route('roles.index')}}" class="btn btn-outline-info btn-lg nav-item mb-2"><i
                    class="fas fa-caret-left"></i>
                Back</a>
        </div>
        <div class="card border-primary mb-3">
            <div class="card-header font-weight-bold">Role Details</div>
            <div class="card-body text-black-50">
                <table class="table table-bordered">
                    <thead>
                    <tr class="bg-primary">
                        <th scope="col">Name</th>
                        <th scope="col">Permissions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$role->name}}</td>
                        <td>
                            @if(!empty($rolePermissions))
                                @foreach($rolePermissions as $v)
                                    <label class="label label-success">{{ $v->name }},</label>
                                @endforeach
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
