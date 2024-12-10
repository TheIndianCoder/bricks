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
                <h1>Add New Land Owner</h1>
                <small>Land Owner list</small>
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
                                        <th>Status</th>
                                        <th>Owner Name</th>
                                        <th>Begha</th>
                                        <th>Contract Amt</th>
                                        <th>P. Amt</th>
                                        <th>Due</th>
                                        <th>From </th>
                                        <th>To</th>
                                        <th>Agg. Date</th>
                                        <th>Agg. Paper</th>
                                        <th>Other Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($landOwner as $item)
                                        <tr>
                                            <td>{{ $i }} </td>
                                            <td>
                                                <button type="button" data-id="{{ $item->id }}"
                                                    data-owner_name="{{ $item->land_lord }}"
                                                    data-begha="{{ $item->begha }}" data-contract_amt="{{ $item->amount }}"
                                                    data-from_date="{{ $item->from_date }}"
                                                    data-to_date="{{ $item->to_date }}"
                                                    data-agg_date="{{ $item->aggrement_date }}"
                                                    data-other="{{ $item->other_details }}"
                                                    data-address="{{$item->land_lord_address}} "
                                                    data-location="{{$item->land_location}}"
                                                    class="btn btn-add btn-land-owner-edit btn-sm" data-toggle="modal"
                                                    data-target="#update">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                            </td>
                                            <td>
                                                @if ($item->states == 'Active')
                                                    <button type="button"
                                                        class="btn btn-success btn-land-owner-change-status btn-sm"
                                                        data-toggle="modal" title="Record is Active" data-target="#change-status"
                                                        data-id="{{ $item->id }}">
                                                        Inactive
                                                    </button>
                                                @else
                                                    <button type="button"
                                                        class="btn btn-danger btn-land-owner-change-status btn-sm"
                                                        data-toggle="modal" title="record is Inactive" data-target="#change-status"
                                                        data-id="{{ $item->id }}">
                                                        Active
                                                    </button>
                                                @endif

                                            </td>
                                            <td>{{ $item->land_lord }} </td>
                                            <td>{{ $item->begha }}</td>
                                            <td>{{ $item->amount }} </td>
                                            <td>{{ $item->total }} </td>
                                            <td>{{ $item->due }} </td>
                                            <td>{{ $item->from_date }} </td>
                                            <td>{{ $item->to_date }} </td>
                                            <td>{{ $item->aggrement_date }} </td>
                                            <td>Download </td>
                                            <td>
                                                View
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
                            <h3><i class="fa fa-user m-r-5"></i> Add New Land Owner</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" action="{{ route('landOwner.add') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <fieldset>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Owner Name</label>
                                                    <input type="text" class="form-control" name="owner_name"
                                                        placeholder="Owner Name">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Owner Address</label>
                                                    <input type="text" class="form-control" name="owner_address"
                                                        placeholder="Owner Address">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Bigha</label>
                                                    <input type="text" class="form-control" name="bigha"
                                                        placeholder="Land Bigha" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Ploat Location</label>
                                                    <input type="text" class="form-control" name="ploat_location"
                                                      placeholder="Ploat location"  required>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>From Date</label>
                                                    <input type="date" class="form-control" name="from_date"
                                                        placeholder="From Date" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>To Date</label>
                                                    <input type="date" class="form-control" name="to_date"
                                                        placeholder="To Date" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Contract Amount</label>
                                                    <input type="text" class="form-control" name="contract_amt"
                                                        placeholder="Contract Amount" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Contract Date</label>
                                                    <input type="date" class="form-control" name="contract_date"
                                                        placeholder="Contract Date" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Aggrement Paper</label>
                                                    <input type="file" class="form-control" name="aggrement_paper"
                                                        required>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Other Details</label>
                                                    <input type="text" class="form-control" name="other_details"
                                                        placeholder="Other Details" required>
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
                            <h3><i class="fa fa-user m-r-5"></i>Update Land Owner</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" action="{{ route('landOwner.edit') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <fieldset>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Owner Name</label>
                                                    <input type="hidden" name="id" id="id">
                                                    <input type="text" class="form-control" name="owner_name"
                                                        placeholder="Owner Name" id="owner_name">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Owner Address</label>
                                                    <input type="text" class="form-control" name="owner_address"
                                                      id="owner_address"  placeholder="Owner Address">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Bigha</label>
                                                    <input type="text" class="form-control" name="bigha"
                                                        placeholder="Land Bigha" id="bigha" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Ploat Location</label>
                                                    <input type="text" class="form-control" id="ploat_location" name="ploat_location"
                                                      placeholder="Ploat location"  required>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>From Date</label>
                                                    <input type="date" class="form-control" name="from_date"
                                                        placeholder="From Date" id="from_edit_date" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>To Date</label>
                                                    <input type="date" class="form-control" name="to_date"
                                                        placeholder="To Date" id="to_date" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Contract Amount</label>
                                                    <input type="text" class="form-control" name="contract_amt"
                                                        placeholder="Contract Amount" id="contract_amt" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Contract Date</label>
                                                    <input type="text" class="form-control" name="contract_date"
                                                        placeholder="Contract Date" id="contract_date" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Aggrement Paper</label>
                                                    <input type="file" class="form-control" name="aggrement_paper"
                                                        id="aggrement_paper">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Other Details</label>
                                                    <input type="text" class="form-control" name="other_details"
                                                        placeholder="Other Details" id="other_details" required>
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
                                    <form class="form-horizontal" method="POST" action="{{route('landOwner.status')}}">
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
