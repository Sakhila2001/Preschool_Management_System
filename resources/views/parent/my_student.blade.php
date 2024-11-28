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
            <h1>My Student </h1>
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
  

            @include('_message')
           
            <!-- /.card -->
             <div class="card">
              <div class="card-header">
                <h3 class="card-title">My Student</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" style="overflow: auto;">
                      <table class="table table-striped">
                  <thead style="font-size: 15px;">
                    <tr>
                      <th>Student Name</th>
                      <th>Email</th>
                      <th>Admission Number</th>
                      <th>Roll Number</th>
                      <th>Class</th>
                      <th>Gender</th>
                      <th>Date of Birth</th>
                      <th>Caste</th>
                      <th>Religion</th>
                      <th>Mobile Number</th>
                      <th>Admission Date</th>
                      <th>Hobbies</th>
                      <th>Blood Group</th>
                      <th>Height</th>
                      <th>Weight</th>
                      <th>Created Date</th>
                      <th>Action</th>
                      

                    </tr>
                  </thead>
                  <tbody style="font-size: 15px;">
                    

                    @foreach($getRecord as $value)
                       <tr style="font-size: 12px;">
                        <td>{{ $value->name}} {{ $value->last_name}}</td>
                         <td>{{ $value->email}}</td>
                         <td>{{ $value->admission_number}}</td>
                         <td>{{ $value->roll_number}}</td>
                         <td>{{ $value->class_name}}</td>
                         <td>{{ $value->gender}}</td>
                         <td>{{ $value->date_of_birth}}</td>
                         <td>{{ $value->caste}}</td>
                         <td>{{ $value->religion}}</td>
                         <td>{{ $value->mobile_number}}</td>
                         <td>{{ $value->admission_date}}</td>
                         <td>{{ $value->hobbies}}</td><td>{{ $value->blood_group}}</td>
                         <td>{{ $value->height}}</td>
                         <td>{{ $value->weight}}</td>
                         <td>{{ date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                         <td style="min-width: 500px;">
                           <a class="btn btn-primary btn-sm" href="{{ url('parent/my_student/subject/'.$value->id)}}">Subject</a>
                 <a class="btn btn-primary btn-sm" href="{{ url('parent/my_student/attendance/'.$value->id)}}">Attendance</a>

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