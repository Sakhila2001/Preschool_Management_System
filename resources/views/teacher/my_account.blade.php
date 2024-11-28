   @extends('layouts.app')
  
  @section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Account</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
         @include('_message')

            <!-- general form elements -->
            <div class="card card-primary">
              
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="">
                {{ csrf_field() }}
                <div class="card-body">

                  <div class="row">
                    <div class="form-group col-md-6">
                    <label>First Name <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" value="{{ old('name', $getRecord->name)}}" name="name" required placeholder="First Name">
                    <div style="color:red">{{ $errors->first('name')}}</div>
                  </div>

                  <div class="form-group col-md-6">
                    <label>Last Name <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" value="{{ old('last_name', $getRecord->last_name)}}" name="last_name" required placeholder="Last Name">
                     <div style="color:red">{{ $errors->first('last_name')}}</div>
                  </div>

                   <div class="form-group col-md-6">
                    <label>Gender <span style="color:red;">*</span></label>
                    <select class="form-control" required name="gender">
                      <option value="">Select Gender</option>
                      <option {{(old('gender', $getRecord->gender) == 'Male') ? 'selected' : ''}} value="Male">Male</option>
                      <option {{(old('gender', $getRecord->gender) == 'Female') ? 'selected' : ''}} value="Female">Female</option>
                      <option {{(old('gender', $getRecord->gender) == 'Other') ? 'selected' : ''}} value="Other">Other</option>

                    </select>
                    <div style="color:red">{{ $errors->first('gender')}}</div>
                  </div>

                  <div class="form-group col-md-6">
                    <label>Marital Status <span style="color:red;">*</span></label>
                    <select class="form-control" required name="marital_status">
                      <option value="">Select Status</option>
                      <option {{(old('marital_status', $getRecord->marital_status) == 'Married') ? 'selected' : ''}} value="Married">Married</option>
                      <option {{(old('marital_status', $getRecord->marital_status) == 'Unmarried') ? 'selected' : ''}} value="Unmarried">Unmarried</option>
                      
                    </select>
                    <div style="color:red">{{ $errors->first('marital_status')}}</div>
                  </div>

                  <div class="form-group col-md-6">
                    <label>Date of Birth <span style="color:red;">*</span></label>
                    <input type="date" class="form-control" required value="{{ old('date_of_birth', $getRecord->date_of_birth)}}" name="date_of_birth" >
                    <div style="color:red">{{ $errors->first('date_of_birth')}}</div>
                  </div>


           

                  <div class="form-group col-md-6">
                    <label>Mobile Number <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" value="{{ old('mobile_number', $getRecord->mobile_number)}}" name="mobile_number"  placeholder="Mobile Number">
                    <div style="color:red">{{ $errors->first('mobile_number')}}</div>
                  </div>

                  
                  <div class="form-group col-md-6">
                    <label>Current Address<span style="color:red;"></span></label>
                    <input type="text" class="form-control" value="{{ old('current_address', $getRecord->current_address)}}" name="current_address" placeholder="Current Address">
                    <div style="color:red">{{ $errors->first('hobbies')}}</div>
                  </div>

                  <div class="form-group col-md-6">
                    <label>Permanent Address<span style="color:red;"></span></label>
                    <input type="text" class="form-control" value="{{ old('permanent_address', $getRecord->permanent_address)}}" name="permanent_address" placeholder="Current Address">
                    <div style="color:red">{{ $errors->first('Permanent Address')}}</div>
                  </div>

                  

                   <div class="form-group col-md-6">
                    <label>Qualification<span style="color:red;"></span></label>
                    <input type="text" class="form-control" value="{{ old('qualification', $getRecord->qualification)}}" name="qualification" placeholder="Qualification">
                    <div style="color:red">{{ $errors->first('qualification')}}</div>
                  </div>


                   <div class="form-group col-md-6">
                    <label>Work Experience<span style="color:red;"></span></label>
                    <input type="text" class="form-control" value="{{ old('work_experience', $getRecord->work_experience)}}" name="work_experience" placeholder="Work Experience">
                    <div style="color:red">{{ $errors->first('work_experience')}}</div>
                  </div>

                  

                  </div>


                  </div>

                  <hr>
                  
                  <div class="form-group" style="margin-left: 10px;">
                    <label>Email <span style="color:red;">*</span></label>
                    <input type="email" class="form-control" value="{{ old('email', $getRecord->email)}}"name="email" required placeholder="Email">
                    <div style="color:red">{{ $errors->first('email')}}</div>
                  </div>
                 
                 
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->


         

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          
          <!--/.col (right) -->
        </div>
      </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

   @endsection