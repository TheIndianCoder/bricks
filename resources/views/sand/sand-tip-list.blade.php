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
                <h1>Add New Sand Owner</h1>
                <small>Sand Owner list</small>
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
                                        <th>Action</th>
                                        <th>Vehical Number</th>
                                        <th>From</th>
                                        <th>Where</th>
                                        <th>Date</th>
                                        <th>Tip Rate</th>
                                        <th>Amount</th>
                                        <th>Payble</th>
                                        <th>Due</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($tipList as $item)
                                        <tr>
                                            <td>{{ $i }} </td>
                                            <td>
                                                <button type="button" data-id="{{ $item->id }}"
                                                    data-vehical_number="{{ $item->vehical_number }}"
                                                    data-from="{{ $item->from }}"
                                                    data-where="{{ $item->where }}"
                                                    data-date="{{ $item->date }}"
                                                    data-rate_of_tip="{{ $item->rate_of_tip }}" 
                                                    class="btn btn-add btn-soil-owner-edit btn-sm" data-toggle="modal"
                                                    data-target="#update">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                            </td>                                            
                                            <td>{{ $item->vehical_number }} </td>
                                            <td>{{ $item->from }}</td>
                                            <td>{{ $item->where }} </td>
                                            <td>{{ $item->date }} </td>
                                            <td>{{ $item->rate_of_tip }} </td>
                                            <td>{{ $item->net_amt }} </td>
                                            <td>{{ $item->pay_amt }} </td>
                                            <td>{{ $item->due_amt }} </td>
                                            <td>Status</td>
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
                            <h3><i class="fa fa-user m-r-5"></i> Add New Sand Owner</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" action="{{ route('sandTip.add') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <fieldset>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Vehical Number</label>
                                                    <input type="text" class="form-control" name="vehical_no"
                                                        placeholder="Vehical Number">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>From Location </label>
                                                    <input type="text" class="form-control" name="from"
                                                      placeholder="From Location"  required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Where Location</label>
                                                    <input type="text" class="form-control" name="where"
                                                        placeholder="Where Location">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Tip Date</label>
                                                    <input type="text" class="form-control" name="date"
                                                        placeholder="Tip Date" required>
                                                </div>
                                            </div>                                            
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Trip Rate</label>
                                                    <input type="text" class="form-control" name="trip rate"
                                                        placeholder="Trip Rate" required>
                                                </div>
                                            </div>                                            
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Number of Tip</label>
                                                    <input type="text" class="form-control" name="no_of_trip"
                                                        required placeholder="Number of Tip">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Net Amount</label>
                                                    <input type="text" class="form-control" name="net_amt"
                                                        required placeholder="Net Amount">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Pay Amount</label>
                                                    <input type="text" class="form-control" name="pay_amt"
                                                        required placeholder="Pay Amount">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Related Document</label>
                                                    <input type="file" class="form-control" name="document"
                                                        >
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

            <!-- Update -->
            <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3><i class="fa fa-user m-r-5"></i>Update Sand Tip</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" action="{{ route('sandTip.update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <fieldset>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Owner Name</label>
                                                    <input type="hidden" name="id" id="id">
                                                    <input type="text" class="form-control" name="owner_name"
                                                      id="owner_name"  placeholder="Owner Name">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Ploat Location</label>
                                                    <input type="text" class="form-control" name="ploat_location"
                                                     id="ploat_location" placeholder="Ploat location"  required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Owner Mobile</label>
                                                    <input type="text" class="form-control" name="owner_mobile"
                                                      id="owner_mobile"  placeholder="Owner Mobile">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Bigha</label>
                                                    <input type="text" class="form-control" name="bigha"
                                                      id="bigha"  placeholder="Land Bigha" required>
                                                </div>
                                            </div>                                            
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Contract Amount</label>
                                                    <input type="text" class="form-control" name="contract_amt"
                                                      id="contract_amt"  placeholder="Contract Amount" required>
                                                </div>
                                            </div>                                            
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Aggrement Paper</label>
                                                    <input type="file" class="form-control" name="aggrement_paper"
                                                        >
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

            <!-- Change status -->
            <div class="modal fade" id="change-status" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3><i class="fa fa-user m-r-5"></i> Change Owner status</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" method="POST" action="{{route('soilOwner.change.status')}}">
                                        @csrf
                                        <fieldset>
                                            <div class="col-md-12 form-group user-form-group">
                                                <label class="control-label">Change Owner Status</label>
                                                <input type="hidden" name="id" id="status-id">
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
