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
            <h1>Parent Student List ({{$getParent->name}} {{$getParent->last_name}})</h1>
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
                <h3 class="card-title">Search Student</h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">


                      <div class="form-group" col-md-2>
                    <label>Student ID</label>
                    <input type="text" class="form-control" value="{{Request::get('id')}}" name="id"  placeholder="Student ID">
                  </div>



                  <div class="form-group" col-md-2 style="margin-left: 10px;">
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



                  

              



                   <div class="form-group" col-md-3 style="margin-left: 10px;">
                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                   <a href="{{url('admin/parent/my_student/'.$parent_id)}}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                   
                  </div>
                 
                 </div>
                  
                </div>
                <!-- /.card-body -->

                
              </form>
            </div>

            @include('_message')
           
            <!-- /.card -->
@if(!empty($getSearchStudent))
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Parent Student List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead style="font-size: 15px;">
                    <tr>
                      <th>#</th>
                      <th>Student Name</th>
                      <th>Email</th>
                      <th>Parent Name</th>
                      <th>Create Date</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                  <tbody style="font-size: 15px;">
                    

                    @foreach($getSearchStudent as $value)
                       <tr style="font-size: 12px;">
                         <td>{{ $value->id}}</td>
                         <td>{{ $value->name}} {{ $value->last_name}}</td>
                         <td>{{ $value->email}}</td>
                         <td>{{ $value->parent_name}}</td>
                         <td>{{ date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                         <td style="min-width: 150px;">
                           <a href="{{url('admin/parent/assign_student_parent/'.$value->id.'/'.$parent_id)}}" class="btn btn-primary btn-sm">Add Student to Parent</a>
                         </td>


                       </tr>
                     @endforeach
                 
                  </tbody>
                </table>
                <div style="padding: 10px; float: right;">
                  
                </div>
              </div>
              <!-- /.card-body -->
@endif


               <div class="card-body p-0">
                      <table class="table table-striped">
                  <thead style="font-size: 15px;">
                    <tr>
                      <th>#</th>
                      <th>Student Name</th>
                      <th>Email</th>
                      <th>Parent Name</th>
                      <th>Create Date</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                  <tbody style="font-size: 15px;">
                    

                    @foreach($getRecord as $value)
                       <tr style="font-size: 12px;">
                         <td>{{ $value->id}}</td>
                         <td>{{ $value->name}} {{ $value->last_name}}</td>
                         <td>{{ $value->email}}</td>
                         <td>{{ $value->parent_name}}</td>
                         <td>{{ date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                         <td style="min-width: 150px;">
                           <a href="{{url('admin/parent/assign_student_parent_delete/'.$value->id)}}" class="btn btn-danger btn-sm">Delete</a>
                         </td>


                       </tr>
                     @endforeach
                 
                  </tbody>
                </table>
                </table>
                <div style="padding: 10px; float: right;">
                  
                </div>
              </div>



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