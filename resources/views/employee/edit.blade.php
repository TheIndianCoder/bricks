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
                <h1>Update Labour</h1>
                <small>Labour list</small>
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
                               <i class="fa fa-list"></i>  Labour List </a>  
                            </div>
                            @include('message')
                         </div>
                        <div class="panel-body">
                            <form action="{{route('employee.edit')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Labour Group</label>
                                        <input type="hidden" name="id" id="id" value="{{$employee->id}}">
                                        <select name="labour_type" id="" class="form-control">
                                            <option selected disabled>Select Labour Group</option>
                                            @foreach ($employeGroup as $item)
                                                <option value="{{$item->id}}"
                                                @if ($item->id == $employee->group_id)
                                                    @selected(true)
                                                @endif    
                                                >{{$item->group_name}} </option>
                                            @endforeach
                                        </select>
                                     </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Sardar Name</label>
                                        <select name="sardar_id" id="" class="form-control">
                                            <option selected disabled>Select Sardar</option>
                                            @foreach ($sardarList as $item)
                                                <option value="{{$item->id}}"
                                                    @if ($item->id == $employee->consultancy_id)
                                                    @selected(true)
                                                    @endif
                                                >{{$item->contact_person}}  [ {{$item->consultancy_name}} ] </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Labour Full Name</label>
                                        <input type="text" class="form-control" name="labour_name" value="{{$employee->name}}" required>
                                     </div>
                                </div>                                
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                        <input type="text" class="form-control" name="mobile" maxlength="10" value="{{$employee->mobile_no}}" required>
                                     </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Home Mobile</label>
                                        <input type="text" class="form-control" name="home_mobile" maxlength="10" value="{{$employee->home_mobile}}" required>
                                     </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Aadhar Number</label>
                                        <input type="text" class="form-control" name="aadhar" maxlength="12" value="{{$employee->aadhar_no}}" required>
                                     </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>DOB</label>
                                        <input type="date" class="form-control" name="dob" value="{{$employee->dob}}" required>
                                     </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Age</label>
                                        <input type="text" class="form-control" name="age" value="{{$employee->age}}" required>
                                     </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Father Full Name</label>
                                        <input type="text" class="form-control" name="father_name" value="{{$employee->father_name}}" required>
                                     </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Address</label><br>
                                        <textarea name="address" id="" cols="60" rows="2" >{{$employee->address}}</textarea>                                        
                                     </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" class="form-control" name="state" value="{{$employee->state}}" required>
                                     </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>District</label>
                                        <input type="text" class="form-control" name="district" value="{{$employee->district}}" required>
                                     </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>PIN Code</label>
                                        <input type="text" class="form-control" maxlength="6" name="pincode" value="{{$employee->pin_code}}" required>
                                     </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Local Address (Optional)</label><br>
                                        <textarea name="local_address" id="" cols="60" rows="2">{{$employee->local_address}}</textarea>
                                        {{-- <input type="text" class="form-control" placeholder="Enter Bank details" required> --}}
                                     </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Local Phone No. (Optional)</label>
                                        <input type="text" name="local_phone" class="form-control" maxlength="10" value="{{$employee->local_phone_no}}" required>
                                     </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Local Guardian (Optional)</label>
                                        <input type="text" class="form-control" name="local_guardian" value="{{$employee->local_guardian}}" required>
                                     </div>
                                </div>
                                <br>
                                
                                <div class="col-sm-12">
                                    <a href="#" class="btn btn-warning">Reset</a>
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                             </form>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </section>
        <!-- /.content -->
    </div>
    
@endsection
