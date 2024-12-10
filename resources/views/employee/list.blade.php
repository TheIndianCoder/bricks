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
                <h1>All Labour</h1>
                <small>Labour list</small>
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
                                <a class="btn btn-add" href="{{route('employee.addView')}}">
                                    <i class="fa fa-list"></i> Add New </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr class="info">
                                        <th>Action</th>
                                        <th>SI</th>
                                        <th>Emp Id</th>
                                        <th>Wallet</th>
                                        <th>Labour Type</th>
                                        <th>Sardar Number</th>
                                        <th>Labour Name</th>
                                        <th>Mobile</th>
                                        <th>Home Mobile</th>
                                        <th>Aadhar</th>
                                        <th>DOB</th>
                                        <th>Age</th>
                                        <th>Father's</th>
                                        <th>State</th>
                                        <th>District</th>
                                        <th>Pin Code</th>
                                        <th>Address</th>
                                        <th>Local Address</th>
                                        <th>Local Phone</th>
                                        <th>Local Guardian</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($employeeList as $item)
                                        <tr>
                                            <td>
                                                <a href="{{route('employee.editView',$item->id)}}"
                                                    class="btn btn-add btn-sm" >
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-delete-labour btn-sm"
                                                    data-toggle="modal" data-target="#delete"
                                                    data-id="{{ $item->id }}">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </td>
                                            <td>{{ $i }} </td>
                                            <td>{{ $item->emp_id }} </td>
                                            <td>{{ $item->wallet }} </td>
                                            <td>{{ $item->group_name }} </td>
                                            <td>{{ $item->consultancy_name }} </td>
                                            <td>{{ $item->name }} </td>
                                            <td>{{ $item->mobile_no }} </td>
                                            <td>{{ $item->home_mobile }} </td>
                                            <td>{{ $item->aadhar_no }} </td>
                                            <td>{{ $item->dob }} </td>
                                            <td>{{ $item->age }} </td>
                                            <td>{{ $item->father_name }} </td>
                                            <td>{{ $item->state }} </td>
                                            <td>{{ $item->district }} </td>
                                            <td>{{ $item->pin_code }} </td>
                                            <td>{{ $item->address }} </td>
                                            <td>{{ $item->local_address }} </td>
                                            <td>{{ $item->local_phone_no }} </td>
                                            <td>{{ $item->local_guardian }} </td>
                                            
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
            
            <!-- Delete -->
            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3><i class="fa fa-user m-r-5"></i> Delete Labour</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal">
                                        <fieldset>
                                            <div class="col-md-12 form-group user-form-group">
                                                <label class="control-label">Delete Labour</label>
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
