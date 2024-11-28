<!-- Content Wrapper. Contains page content -->
  @extends('layouts.app')
  
  @section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Parent List (Total : {{ $getRecord->total()}})</h1>
          </div>
           <div class="col-sm-6" style="text-align: right;">
            <a href="{{ url('admin/parent/add')}}" class="btn btn-primary">Add New Parent</a>
            <!-- <a href="{{ route('parent.report') }}" class="btn btn-info">Report</a> -->

          </div>


        </div>
      </div><!-- /.container-fluid -->
    </section>


<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card card">
              <div class="card-header">
                <h3 class="card-title">Search Parent</h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                  <div class="form-group" col-md-2>
                    <label>Name</label>
                    <input type="text" class="form-control" value="{{Request::get('name')}}" name="name"  placeholder="Name">
                  </div>

                  <div class="form-group" col-md-2 style="margin-left: 10px;">
                    <label>Last Name</label>
                    <input type="text" class="form-control" value="{{Request::get('last_name')}}"name="last_name" placeholder="Last Name">
                   
                  </div>

                  <div class="form-group" col-md-2 style="margin-left: 10px;">
                    <label>Email</label>
                    <input type="text" class="form-control" value="{{Request::get('email')}}"name="email"  placeholder="Email">
                   
                  </div>



                  <div class="form-group" col-md-2 style="margin-left: 10px;">
                    <label>Gender</label>
                    <select class="form-control"  name="gender">
                      <option value="">Select Gender</option>
                      <option {{(Request::get('gender') == 'Male') ? 'selected' : ''}} value="Male">Male</option>
                      <option {{(Request::get('gender') == 'Female') ? 'selected' : ''}} value="Female">Female</option>
                      <option {{(Request::get('gender') == 'Other') ? 'selected' : ''}} value="Other">Other</option>

                    </select>
                   
                  </div>

              


                  <div class="form-group" col-md-2 style="margin-left: 10px;">
                    <label>Occupation</label>
                    <input type="text" class="form-control" value="{{Request::get('occupation')}}"name="occupation"  placeholder="Occupation">
                   
                  </div>

                  <div class="form-group" col-md-2 style="margin-left: 10px;">
                    <label>Address</label>
                    <input type="text" class="form-control" value="{{Request::get('address')}}"name="address" placeholder="Address">
                   
                  </div>

                    <div class="form-group" col-md-2 style="margin-left: 10px;">
                    <label>Mobile Number</label>
                    <input type="text" class="form-control" value="{{Request::get('mobile_number')}}"name="mobile_number" placeholder="Mobile Number">
                   
                  </div>

                  
                  <div class="form-group" col-md-2 style="margin-left: 10px;">
                    <label>Status</label>
                    <select class="form-control"  name="status">
                      <option value="">Select Status</option>
                      <option {{(Request::get('status') == 0) ? 'Active' : ''}} value="0">Active</option>
                      <option {{(Request::get('status') == 1) ? 'Inactive' : ''}} value="1">Inactive</option>
                    
                    </select>
                   
                  </div>
               <div class="form-group" col-md-2 style="margin-left: 10px;">
                    <label>Created Date</label>
                    <input type="date" class="form-control" value="{{Request::get('date')}}"name="date" >
                   
                  </div>

              



                   <div class="form-group" col-md-3 style="margin-left: 10px;">
                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                   <a href="{{url('admin/parent/list')}}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                   
                  </div>
                 
                 </div>
                  
                </div>
                <!-- /.card-body -->

                
              </form>
            </div>

            @include('_message')
           
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Parent List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead style="font-size: 12px;">
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Gender</th>
                      <th>Mobile Number</th>
                      <th>Occupation</th>
                      <th>Address</th>
                      <th>Status</th>
                      <th>Create Date</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                  <tbody style="font-size: 12px;">>
                     @foreach($getRecord as $value)
                       <tr>
                         <td>{{ $value->id}}</td>
                         <td>{{ $value->name}} {{ $value->last_name}}</td>
                         <td>{{ $value->email}}</td>
                         <td>{{ $value->gender}}</td>
                         <td>{{ $value->mobile_number}}</td>
                         <td>{{ $value->occupation}}</td>
                         <td>{{ $value->address}}</td>
                         <td>{{ ($value->status ==0)? 'Active' : 'Inactive'}}</td>
                         <td>{{ date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                         <td style="min-width: 250px;">
                           <a href="{{url('admin/parent/edit/'.$value->id)}}" class="btn btn-primary btn-sm">Edit</a>
                           <a href="{{url('admin/parent/delete/'.$value->id)}}" class="btn btn-danger btn-sm">Delete</a>
                            <a href="{{url('admin/parent/my_student/'.$value->id)}}" class="btn btn-primary btn-sm">My student</a>
                         </td>


                       </tr>
                     @endforeach
                 
                  </tbody>
                </table>
                <div style="padding: 10px; float: right;">
                  {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                  
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
   
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
  <!-- /.content-wrapper -->