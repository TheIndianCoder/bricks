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
                <h1>Add New Vehical</h1>
                <small>Vehical list</small>
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
                        <div class="table-responsive">
                            <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr class="info">
                                        <th>SI</th>
                                        <th>Group Name</th>
                                        <th>Owner Name</th>
                                        <th>Wallet</th>
                                        <th>Vehical Number</th>
                                        <th>Chassis Number</th>
                                        <th>Poluation Number</th>
                                        <th>Good For Condition</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($data['vehicalList'] as $item)
                                        <tr>
                                            <td>{{ $i }} </td>
                                            <td>{{ $item->group_name }} </td>
                                            <td>{{ $item->company_name }} - {{ $item->owner_name }} </td>
                                            <td>{{ $item->wallet }} </td>
                                            <td>{{ $item->vehical_number }} </td>
                                            <td>{{ $item->chassis_number }} </td>
                                            <td>{{ $item->poluation_number }} </td>
                                            <td>{{ $item->good_for_working }} </td>
                                            <td>{{ $item->status }} </td>
                                            <td>
                                                <a href="{{ route('vehical.vehicalEditView', $item->id) }}"
                                                    class="btn btn-add btn-sm">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-delete-vehical-list btn-sm"
                                                    data-toggle="modal" data-target="#delete"
                                                    data-id="{{ $item->id }}">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add New -->
            <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3><i class="fa fa-user m-r-5"></i> Add New Vehical</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" action="{{ route('vehical.VehicalAdd') }}"
                                        method="POST">
                                        @csrf
                                        <fieldset>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Select Vehical Owner</label>
                                                    <select name="owner_id" id="" class="form-control" required>
                                                        <option value="" selected disabled>Select Vehical Owner
                                                        </option>
                                                        @foreach ($data['vehicalOwner'] as $item)
                                                            <option value="{{ $item->id }}">{{ $item->company_name }}
                                                                - {{ $item->owner_name }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Select Vehical Group</label>
                                                    <select name="vehical_group_id" id="" class="form-control"
                                                        required>
                                                        <option value="" selected disabled>Select Vehical Group
                                                        </option>
                                                        @foreach ($data['vehicalGroupList'] as $item)
                                                            <option value="{{ $item->id }}">{{ $item->group_name }}
                                                            </option>
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
                                                            <option value="{{ $item->id }}">{{ $item->emp_id }} -
                                                                {{ $item->name }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Vehical Number</label>
                                                    <input type="text" class="form-control" name="vehical_number"
                                                        placeholder="Vehical Number" maxlength="15">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Chassis Number</label>
                                                    <input type="text" class="form-control" name="chessis_number"
                                                        placeholder="Chessis Number" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Poluation Number</label>
                                                    <input type="text" class="form-control" name="poluation_number"
                                                        placeholder="Poluation Number" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Good For Working</label>
                                                    <select name="good_for_working" id="" class="form-control">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-12 modal-footer">
                                                <div class="pull-right">
                                                    <button type="button" data-dismiss="modal"
                                                        class="btn btn-danger btn-sm">Cancel</button>
                                                    <button type="submit" class="btn btn-add btn-sm">Save</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Delete -->
            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3><i class="fa fa-user m-r-5"></i> Delete Vehical Owner</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal">
                                        <fieldset>
                                            <div class="col-md-12 form-group user-form-group">
                                                <label class="control-label">Delete Vehical Owner</label>
                                                <input type="hidden" name="id" id="delete-id">
                                                <div class="pull-right">
                                                    <button type="submit" name="delete_conifrm" value="yes"
                                                        class="btn btn-add btn-sm">YES</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection
