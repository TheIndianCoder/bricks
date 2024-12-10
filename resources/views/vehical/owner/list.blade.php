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
                <h1>Add Vehical Owner</h1>
                <small>Vehical Owner list</small>
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
                                        <th>Company Name</th>
                                        <th>Owner Name</th>
                                        <th>No. of Vehicals</th>
                                        <th>Wallet</th>
                                        <th>GST</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($vehicalOwnerList as $item)
                                        <tr>
                                            <td>{{ $i }} </td>
                                            <td>{{ $item->company_name }} </td>
                                            <td>{{ $item->owner_name }} </td>
                                            <td>{{ $item->no_of_vehicals }} </td>
                                            <td>{{ $item->wallet }} </td>
                                            <td>{{ $item->gst_number }} </td>
                                            <td>{{ $item->status }} </td>
                                            <td>
                                                <button type="button" data-id="{{ $item->id }}"
                                                    data-company_name="{{ $item->company_name }}"
                                                    data-owner_name="{{ $item->owner_name }}"
                                                    data-registration="{{ $item->registration_no }}"
                                                    data-gst_number="{{ $item->gst_number }}"
                                                    class="btn btn-add btn-vehical-owner-edit btn-sm" data-toggle="modal"
                                                    data-target="#update">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                                <button type="button"
                                                    class="btn btn-danger btn-delete-vehical-owner btn-sm"
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
                            <h3><i class="fa fa-user m-r-5"></i> Add New Owner</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" action="{{ route('vehical.addOwner') }}" method="POST">
                                        @csrf
                                        <fieldset>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Company Name</label>
                                                    <input type="text" class="form-control" name="company_name"
                                                        placeholder="Company Name" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Owner Name</label>
                                                    <input type="text" class="form-control" name="owner_name"
                                                        placeholder="Owner Name" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>GST Number</label>
                                                    <input type="text" class="form-control" name="gst"
                                                        placeholder="GST Number" maxlength="15">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Registration Number</label>
                                                    <input type="text" class="form-control" name="registration"
                                                        placeholder="Registration Number" required>
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
                            <h3><i class="fa fa-user m-r-5"></i> Update Owner</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" action="{{ route('vehical.editOwner') }}"
                                        method="POST">
                                        @csrf
                                        <fieldset>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Company Name</label>
                                                    <input type="hidden" name="id" id="id">
                                                    <input type="text" class="form-control" name="company_name"
                                                        placeholder="Company Name" id="company_name" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Owner Name</label>
                                                    <input type="text" class="form-control" name="owner_name"
                                                        placeholder="Owner Name" required id="owner_name">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>GST Number</label>
                                                    <input type="text" class="form-control" name="gst"
                                                        placeholder="GST Number" maxlength="15" id="gst" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Registration Number</label>
                                                    <input type="text" class="form-control" name="registration"
                                                        placeholder="Registration Number" required id="registration">
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
