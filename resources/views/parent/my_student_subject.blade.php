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
            <h4> Student Subject <span style="color:blue;"> ({{ $getUser->name}} {{ $getUser->last_name}})</span></h4>
          </div>
        

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card card">
              
             

            @include('_message')
           
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Student Subject </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Subject Name</th>
                      <th>Subject Type</th>
                      <!-- <th>Action</th> -->
                      

                    </tr>
                  </thead>
                  <tbody>
                   @foreach($getRecord as $value)

                   <tr>
                     <td>{{ $value->subject_name}}</td>
                     <td>{{ $value->subject_type}}</td>
                     <!-- <td><a href="{{ url('parent/my_student/subject/class_timetable/'.$value->class_id.'/'.$value->subject_id.'/'.$getUser->id)}}" class="btn btn-primary">My Class Timetable</a></td> -->
                    </tr>

                   @endforeach
                      
                  </tbody>
                </table>
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