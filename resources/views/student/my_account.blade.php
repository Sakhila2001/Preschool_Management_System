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
            <!-- general form elements -->
            <div class="card card-primary">
              
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="">
                {{ csrf_field() }}
                <div class="card-body">

                  <div class="row">

                    <div class="form-group col-md-6">
                       @include('_message')
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
                    <label>Date of Birth <span style="color:red;">*</span></label>
                    <input type="date" class="form-control" required value="{{ old('date_of_birth', $getRecord->date_of_birth)}}" name="date_of_birth" >
                    <div style="color:red">{{ $errors->first('date_of_birth')}}</div>
                  </div>

                  <div class="form-group col-md-6">
                    <label>Caste <span style="color:red;"></span></label>
                    <input type="text" class="form-control" value="{{ old('caste', $getRecord->caste)}}" name="caste"  placeholder="Caste">
                    <div style="color:red">{{ $errors->first('caste')}}</div>
                  </div>


                   <div class="form-group col-md-6">
                    <label>Religion <span style="color:red;"></span></label>
                    <input type="text" class="form-control" value="{{ old('religion', $getRecord->religion)}}" name="religion"  placeholder="Religion">
                    <div style="color:red">{{ $errors->first('religion')}}</div>
                  </div>


                  <div class="form-group col-md-6">
                    <label>Mobile Number <span style="color:red;"></span></label>
                    <input type="text" class="form-control" value="{{ old('mobile_number', $getRecord->mobile_number)}}" name="mobile_number"  placeholder="Mobile Number">
                    <div style="color:red">{{ $errors->first('mobile_number')}}</div>
                  </div>

                  
                  
                  <div class="form-group col-md-6">
                    <label>Hobbies<span style="color:red;"></span></label>
                    <input type="text" class="form-control" value="{{ old('hobbies', $getRecord->hobbies)}}" name="hobbies" placeholder="Hobbies">
                    <div style="color:red">{{ $errors->first('hobbies')}}</div>
                  </div>

                   <div class="form-group col-md-6">
                    <label>Blood Group<span style="color:red;"></span></label>
                    <input type="text" class="form-control" value="{{ old('blood_group', $getRecord->blood_group)}}" name="blood_group" placeholder="Blood Group">
                    <div style="color:red">{{ $errors->first('blood_group')}}</div>
                  </div>

                   <div class="form-group col-md-6">
                    <label>Height<span style="color:red;"></span></label>
                    <input type="text" class="form-control" value="{{ old('height', $getRecord->height)}}" name="height" placeholder="Height">
                    <div style="color:red">{{ $errors->first('height')}}</div>
                  </div>


                   <div class="form-group col-md-6">
                    <label>Weight<span style="color:red;"></span></label>
                    <input type="text" class="form-control" value="{{ old('weight', $getRecord->weight)}}" name="weight" placeholder="Weight">
                    <div style="color:red">{{ $errors->first('weight')}}</div>
                  </div>


                  <div class="form-group col-md-6">
                    <label>Status <span style="color:red;">*</span></label>
                    <select class="form-control" required name="status">
                      <option value="">Select Status</option>
                      <option {{(old('status', $getRecord->status) == 0 ) ? 'selected' : ''}} value="0">Active</option>
                      <option {{(old('status', $getRecord->status) == 1 ) ? 'selected' : ''}} value="1">Inactive</option>
                      

                    </select>
                    <div style="color:red">{{ $errors->first('status')}}</div>
                    
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
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

   @endsection