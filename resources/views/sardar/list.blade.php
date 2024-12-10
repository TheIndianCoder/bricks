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
                <h1>Add Customer</h1>
                <small>Customer list</small>
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
                                        <th>Sardar Id</th>
                                        <th>Consultancy Name</th>
                                        <th>Contact Person</th>
                                        <th>Wallet</th>
                                        <th>Address</th>
                                        <th>Aadhar</th>
                                        <th>Mobile 1</th>
                                        <th>Mobile 2</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($sardarList as $item)
                                        <tr>
                                            <td>{{ $i }} </td>
                                            <td>{{ $item->sardar_id }} </td>
                                            <td>{{ $item->consultancy_name }} </td>
                                            <td>{{ $item->contact_person }} </td>
                                            <td>{{ $item->wallet }} </td>
                                            <td>{{ $item->address }} </td>
                                            <td>{{ $item->aadhar_number }} </td>
                                            <td>{{ $item->mobile1 }} </td>
                                            <td>{{ $item->mobile2 }} </td>
                                            <td>
                                                <button type="button" data-id="{{ $item->id }}"
                                                    data-consultancy_name="{{ $item->consultancy_name }}"
                                                    data-contact_person="{{ $item->contact_person }}"
                                                    data-address="{{ $item->address }}"
                                                    data-aadhar_number="{{ $item->aadhar_number }}"
                                                    data-mobile1="{{ $item->mobile1 }}"
                                                    data-mobile2="{{ $item->mobile2 }}"
                                                    class="btn btn-add btn-sardar-edit btn-sm" data-toggle="modal"
                                                    data-target="#update">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-delete-sardar btn-sm"
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
                            <h3><i class="fa fa-user m-r-5"></i> Add New Sardar</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" action="{{ route('sardar.add') }}" method="POST">
                                        @csrf
                                        <fieldset>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Consultancy Name</label>
                                                    <input type="text" class="form-control" name="consultancy_name"
                                                        placeholder="Consultancy Name" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Contact Person</label>
                                                    <input type="text" class="form-control" name="contact_person"
                                                        placeholder="Contact Name" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" class="form-control" name="address"
                                                        placeholder="Address" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Aadhar Number</label>
                                                    <input type="text" class="form-control" name="aadhar" maxlength="12"
                                                        placeholder="Aadhar Number" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Mobile Number 1</label>
                                                    <input type="text" maxlength="10" class="form-control" name="mobile1"
                                                        placeholder="Mobile Number 1" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Mobile Number 2</label>
                                                    <input type="text" class="form-control" name="mobile2"
                                                        placeholder="Mobile Number 2" maxlength="10" required>
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
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- Update -->
            <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3><i class="fa fa-user m-r-5"></i> Update Sardar</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" action="{{ route('sardar.update') }}" method="POST">
                                        @csrf
                                        <fieldset>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Consultancy Name</label>
                                                    <input type="hidden" name="id" id="id">
                                                    <input type="text" class="form-control" id="consultancy_name"
                                                        name="consultancy_name" placeholder="Consultancy Name" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Contact Person</label>
                                                    <input type="text" class="form-control" id="contact_person"
                                                        name="contact_person" placeholder="Contact Name" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" class="form-control" id="address"
                                                        name="address" placeholder="Address" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Aadhar Number</label>
                                                    <input type="text" class="form-control" id="aadhar"
                                                        name="aadhar" maxlength="12" placeholder="Aadhar Number"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Mobile Number 1</label>
                                                    <input type="text" maxlength="10" id="mobile1"
                                                        class="form-control" name="mobile1" placeholder="Mobile Number 1"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Mobile Number 2</label>
                                                    <input type="text" class="form-control" id="mobile2"
                                                        name="mobile2" placeholder="Mobile Number 2" maxlength="10"
                                                        required>
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
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- Delete -->
            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3><i class="fa fa-user m-r-5"></i> Delete Sardar</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal">
                                        <fieldset>
                                            <div class="col-md-12 form-group user-form-group">
                                                <label class="control-label">Delete Sardar</label>
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
