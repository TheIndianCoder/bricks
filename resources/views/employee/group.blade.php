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
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="btn-group" id="buttonexport">
                                <a href="#">
                                    <h4>Customer Group</h4>
                                </a>
                                {{-- @include('message') --}}
                            </div>
                        </div>
                        <div class="panel-body">
                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                            <div class="btn-group">
                                <div class="buttonexport" id="buttonlist">
                                    <button class="btn btn-add" type="button" data-toggle="modal" data-target="#add">
                                        <i class="fa fa-plus"></i> Add Group
                                    </button>
                                </div>
                            </div>
                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                            <div class="table-responsive">
                                <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr class="info">
                                            <th>SI</th>
                                            <th>Group Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($groupList as $item)
                                            <tr>
                                                <td>{{ $i }} </td>
                                                <td>{{ $item->group_name }} </td>
                                                <td>
                                                    @if ($item->status == 'Active')
                                                        <span class="label-custom label label-default">Active</span>
                                                    @else
                                                        <span class="label-danger label label-default">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" data-name="{{ $item->group_name }}"
                                                        data-id="{{ $item->id }}" class="btn btn-add btn-employee-group-edit btn-sm"
                                                        data-toggle="modal" data-target="#update">
                                                        <i class="fa fa-pencil"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-delete-emp_group btn-sm" data-toggle="modal"
                                                        data-target="#delete" data-id="{{$item->id}}">
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
            </div>
            <!-- Add New -->
            <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3><i class="fa fa-user m-r-5"></i> Add New Employee Group</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" action="{{ route('employee.group.add') }}" method="POST">
                                        @csrf
                                        <fieldset>
                                            <!-- Text input-->
                                            <div class="col-md-12 form-group">
                                                <label class="control-label">Group Name:</label>
                                                <input type="text" placeholder="Group Name" name="group_name"
                                                    class="form-control">
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
                            <h3><i class="fa fa-user m-r-5"></i> Update Group</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" action="{{ route('employee.group.edit') }}" method="POST">
                                        @csrf
                                        <fieldset>
                                            <!-- Text input-->
                                            <div class="col-md-12 form-group">
                                                <label class="control-label">Group Name:</label>
                                                <input type="hidden" name="id" id="id">
                                                <input type="text" placeholder="Group Name" name="group_name"
                                                    class="form-control">
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
            <!-- /.modal -->
            <!-- Modal -->
            <!-- Conifrm -->
            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3><i class="fa fa-user m-r-5"></i> Delete Employee Group</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal">
                                        <fieldset>
                                            <div class="col-md-12 form-group user-form-group">
                                                <label class="control-label">Delete Employee Group</label>
                                                <input type="hidden" name="id" id="delete-id">
                                                <div class="pull-right">
                                                    <button type="submit" name="delete_conifrm" value="yes" class="btn btn-add btn-sm">YES</button>
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
    </div>
    
@endsection
