@extends('include.layout')

@section('layout')
    <!-- =============================================== -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-users"></i>
            </div>
            <div class="header-title">
                <h1>Update Vehical</h1>
                <small>Vehical Update</small>
            </div>
        </section>
        @include('message')
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="btn-group" id="buttonlist">
                                <button class="btn btn-add" data-toggle="modal" data-target="#add">
                                    <i class="fa fa-list"></i> Add New </button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" action="{{ route('vehical.vehicalListEdit') }}" method="POST">
                                @csrf
                                <fieldset>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Select Vehical Owner</label>
                                            <input type="hidden" name="id" id="id" value="{{$data['vehicalList']->id}}">
                                            <select name="owner_id" id="" class="form-control" required>
                                                <option value="" selected disabled>Select Vehical Owner </option>
                                                @foreach ($data['vehicalOwner'] as $item)
                                                    <option value="{{ $item->id }}"
                                                        @if ($item->id == $data['vehicalList']->owner_id) @selected(true) @endif>
                                                        {{ $item->company_name }} - {{ $item->owner_name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Select Vehical Group</label>
                                            <select name="vehical_group_id" id="" class="form-control" required>
                                                <option value="" selected disabled>Select Vehical Group</option>
                                                @foreach ($data['vehicalGroupList'] as $item)
                                                    <option value="{{ $item->id }}"
                                                        @if ($item->id == $data['vehicalList']->group_id) @selected(true) @endif>
                                                        {{ $item->group_name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Select Driver</label>
                                            <select name="driver_id" id="" class="form-control">
                                                <option value="" selected disabled>Select Driver</option>
                                                @foreach ($data['driverList'] as $item)
                                                    <option value="{{ $item->id }}"
                                                        @if ($item->id == $data['vehicalList']->driver_id) @selected(true) @endif>
                                                        {{ $item->emp_id }} - {{ $item->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Vehical Number</label>
                                            <input type="text" class="form-control" name="vehical_number"
                                                placeholder="Vehical Number" maxlength="15"
                                                value="{{ $data['vehicalList']->vehical_number }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Chassis Number</label>
                                            <input type="text" class="form-control" name="chessis_number"
                                                placeholder="Chessis Number"
                                                value="{{ $data['vehicalList']->chassis_number }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Poluation Number</label>
                                            <input type="text" class="form-control" name="poluation_number"
                                                placeholder="Poluation Number" 
                                                value="{{ $data['vehicalList']->poluation_number }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Good For Working</label>
                                            <select name="good_for_working" id="" class="form-control">
                                                <option value="Yes"
                                                    @if ($data['vehicalList']->good_for_working == 'Yes') @selected(true) @endif>
                                                    Yes</option>
                                                <option value="No"
                                                    @if ($data['vehicalList']->good_for_working == 'No') @selected(true) @endif>No
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12 modal-footer">
                                        <div class="pull-right">
                                            <button type="button" data-dismiss="modal"
                                                class="btn btn-danger btn-sm">Cancel</button>
                                            <button type="submit" class="btn btn-add btn-sm">Update</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
