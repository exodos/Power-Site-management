@extends('layouts.master')

@section('title')
    AirConditioners Information
@endsection

@section('sitemap')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('airconditioners.index')}}">Index</a></li>
    <li class="breadcrumb-item active"><a href="#">Create</a></li>
@endsection

@section('content')

    <div class="container">
        <div class="card border-primary">
            <div class="card-header font-weight-bold bg-gradient-primary"><h3 class="mb-0">Create Air Conditioners</h3>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-group">
                            @foreach($errors->all() as $error)
                                <li class="list-group-item text-danger">
                                    {{$error}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{route('airconditioners.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="id">Id</label>
                        <input type="number" class="form-control" id="id" name="id" value="{{request()->old('id')}}">
                    </div>
                    <div class="form-group">
                        <label for="air_conditioners_type">Air Conditioner Type</label>
                        <select class="form-control form-control-lg mb-3" name="air_conditioners_type"
                                id="air_conditioners_type">
                            <option value="none" selected disabled hidden>Please Select</option>
                            <option value="STULZ">STULZ</option>
                            <option value="AIRSYS">AIRSYS</option>
                            <option value="WEISS">WEISS</option>
                            <option value="Fjutisu">Fjutisu</option>
                            <option value="TADIRAN">TADIRAN</option>
                            <option value="Hisense">Hisense</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="air_conditioners_model">Air Conditioner Model</label>
                        <select class="form-control form-control-lg mb-3" name="air_conditioners_model"
                                id="air_conditioners_model">
                            <option value="none" selected disabled hidden>Please Select</option>
                            <option value="ASU812AS">ASU812AS</option>
                            <option value="ASU622AS">ASU622AS</option>
                            <option value="CSU542A">CSU542A</option>
                            <option value="CSU442A">CSU442A</option>
                            <option value="CSU431A">CSU431A</option>
                            <option value="CSU352A">CSU352A</option>
                            <option value="CCU251A">CCU251A</option>
                            <option value="CCU271A">CCU271A</option>
                            <option value="CCU201A">CCU201A</option>
                            <option value="CCD91A">CSU352ACCD91A
                            <option value="CCU81A">CCU81A</option>
                            <option value="DXA40E1S7">DXA40E1S7</option>
                            <option value="DXA22E1S4">DXA22E1S4</option>
                            <option value="DATA240UV">DATA240UV</option>
                            <option value="DATA45UV">DATA45UV</option>
                            <option value="WVL2000S">WVL2000S</option>
                            <option value="AOY30EPAL">AOY30EPAL</option>
                            <option value="TCO-28H">TCO-28H</option>
                            <option value="KT3FR-250LW/01TDE">KT3FR-250LW/01TDE</option>
                            <option value="KT3FR-120LW/01TDE">KT3FR-120LW/01TDE</option>
                            <option value="KF-80W/T12SE-N1">KF-80W/T12SE-N1</option>
                            <option value="KFR-68WT/TSE-N3">KFR-68WT/TSE-N3</option>
                            <option value="KFR-68WT/TSE-N3">KFR-68WT/TSE-N3</option>
                            <option value="KFR-50W/01TFE">KFR-50W/01TFE</option>
                            <option value="KFR-48W/01TFE">KFR-48W/01TFE</option>
                            <option value="KFR-25W/01TFE">KFR-25W/01TFE</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="air_conditioners_capacity">Air Conditioner Capacity</label>
                        <select class="form-control form-control-lg mb-3" name="air_conditioners_capacity"
                                id="air_conditioners_capacity">
                            <option value="none" selected disabled hidden>Please Select</option>
                            <option value="2.5KW">2.5KW</option>
                            <option value="4.8KW">4.8KW</option>
                            <option value="5KW">5KW</option>
                            <option value="6.8KW">6.8KW</option>
                            <option value="7.9KW">7.9KW</option>
                            <option value="8KW">8KW</option>
                            <option value="9KW">9KW</option>
                            <option value="12KW">12KW</option>
                            <option value="19KW">19KW</option>
                            <option value="20KW">20KW</option>
                            <option value="22KW">22KW</option>
                            <option value="25KW">25KW</option>
                            <option value="27KW">27KW</option>
                            <option value="35KW">35KW</option>
                            <option value="43KW">43KW</option>
                            <option value="44KW">44KW</option>
                            <option value="54KW">54KW</option>
                            <option value="62KW">62KW</option>
                            <option value="76KW">76KW</option>
                            <option value="81KW">81KW</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="functional_type">Functional Type</label>
                        <select class="form-control form-control-lg mb-3" name="functional_type"
                                id="functional_type">
                            <option value="none" selected disabled hidden>Please Select</option>
                            <option value="auto">Functional</option>
                            <option value="faulty">Faulty</option>
                            <option value="damaged">Damaged</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gas_type">Gas Type</label>
                        <select class="form-control form-control-lg mb-3" name="gas_type"
                                id="gas_type">
                            <option value="none" selected disabled hidden>Please Select</option>
                            <option value="R134A">R134A</option>
                            <option value="R410">R410</option>
                            <option value="R422">R422</option>
                            <option value="R407">R407</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="lld_number">LLD Number</label>
                        <input type="number" class="form-control" id="lld_number" name="lld_number"
                               value="{{request()->old('lld_number')}}">
                    </div>
                    <div class="form-group">
                        <label for="commission_date">Commission Date</label>
                        <input type="date" class="form-control" id="commission_date"
                               name="commission_date">
                    </div>
                    <div class="form-group">
                        <label for="site_id">Site Id</label>
                        <select class="form-control form-control-lg mb-3" name="site_id"
                                id="site_id">
                            <option value="none" selected disabled hidden>Please Select</option>
                            @foreach(\App\Models\Site::all() as $site)
                                <option value="{{$site->id}}">{{$site->id}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="work_order_id">Work Order Id</label>
                        <select class="form-control form-control-lg mb-3" name="work_order_id"
                                id="work_order_id">
                            <option value="none" selected disabled hidden>Please Select</option>
                            @foreach(\App\Models\WorkOrder::whereNotIn('id', function ($query){
                                   $query->select('work_order_id')->from('air_conditioners');})->get() as $workOrder)
                                <option value="{{$workOrder->id}}">{{$workOrder->id}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary btn-lg">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
