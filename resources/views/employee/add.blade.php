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
                            <div class="btn-group" id="buttonlist"> 
                               <a class="btn btn-add " href="{{route('employee.list')}}"> 
                               <i class="fa fa-list"></i>  Employee List </a>  
                            </div>
                         </div>
                         @include('message')
                        <div class="panel-body">
                            <form action="{{route('employee.add')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Labour Type</label>
                                        <select name="labour_type" id="" class="form-control">
                                            <option selected disabled>Select Labour Type</option>
                                            @foreach ($employeGroup as $item)
                                                <option value="{{$item->id}}">{{$item->group_name}} </option>
                                            @endforeach
                                        </select>
                                     </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Sardar Name [Not for driver group] </label>
                                        <select name="sardar_id" id="" class="form-control">
                                            <option selected value="0">Select Sardar</option>
                                            @foreach ($sardarList as $item)
                                                <option value="{{$item->id}}">{{$item->contact_person}}  [ {{$item->consultancy_name}} ] </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Labour Full Name</label>
                                        <input type="text" class="form-control" name="labour_name" placeholder="Enter Full Name" required>
                                     </div>
                                </div>                                
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                        <input type="text" class="form-control" name="mobile" maxlength="10" placeholder="Enter Mobile Number" required>
                                     </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Home Mobile</label>
                                        <input type="text" class="form-control" name="home_mobile" maxlength="10" placeholder="Enter Home Mobile" required>
                                     </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Aadhar Number</label>
                                        <input type="text" class="form-control" name="aadhar" maxlength="12" placeholder="Aadhar Number" required>
                                     </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>DOB</label>
                                        <input type="date" class="form-control" name="dob" placeholder="Labour Date of Birth" required>
                                     </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Age</label>
                                        <input type="text" class="form-control" name="age" placeholder="Labour Current Age" required>
                                     </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Father Full Name</label>
                                        <input type="text" class="form-control" name="father_name" placeholder="Father Name" required>
                                     </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Address</label><br>
                                        <textarea name="address" id="" cols="60" rows="2" placeholder="Labour Home Address"></textarea>                                        
                                     </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" class="form-control" name="state" placeholder="Labour Home State" required>
                                     </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>District</label>
                                        <input type="text" class="form-control" name="district" placeholder="Labour Home District" required>
                                     </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>PIN Code</label>
                                        <input type="text" class="form-control" maxlength="6" name="pincode" placeholder="Labour Home Pin code" required>
                                     </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Local Address (Optional)</label><br>
                                        <textarea name="local_address" id="" cols="60" rows="2" placeholder="local Address"></textarea>
                                        {{-- <input type="text" class="form-control" placeholder="Enter Bank details" required> --}}
                                     </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Local Phone No. (Optional)</label>
                                        <input type="text" name="local_phone" class="form-control" maxlength="10" placeholder="Local Mobile Number">
                                     </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Local Guardian (Optional)</label>
                                        <input type="text" class="form-control" name="local_guardian" placeholder="Local Guardian">
                                     </div>
                                </div>
                                <br>
                                
                                <div class="col-sm-12">
                                    <a href="#" class="btn btn-warning">Reset</a>
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                             </form>
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
            
        </section>
        <!-- /.content -->
    </div>
    
@endsection
