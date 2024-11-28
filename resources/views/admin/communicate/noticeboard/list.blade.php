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
            <h1>Notice Board</h1>
          </div>
           <div class="col-sm-6" style="text-align: right;">
            <a href="{{ url('admin/communicate/notice_board/add')}}" class="btn btn-primary">Add New Notice Board</a>
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
                <h3 class="card-title">Search Notice Board</h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                  <div class="form-group" col-md-2>
                    <label>Title</label>
                    <input type="text" class="form-control" value="{{Request::get('title')}}" name="title"  placeholder="Title">
                  </div>
                    
                       

                       <div class="form-group" col-md-2 style="margin-left: 10px;">
                    <label>Notice Date From</label>
                    <input type="date" class="form-control" value="{{Request::get('notice_date_from')}}"name="notice_date_from">
                   
                  </div>


                    <div class="form-group" col-md-2 style="margin-left: 10px;">
                    <label>Notice Date To</label>
                    <input type="date" class="form-control" value="{{Request::get('notice_date_to')}}"name="notice_date_to">
                   
                  </div>
                   
                  
                  <div class="form-group" col-md-2 style="margin-left: 10px;">
                    <label>Public Date From</label>
                    <input type="date" class="form-control" value="{{Request::get('publish_date_from')}}"name="publish_date_from">
                   
                  </div>
                   
                   <div class="form-group" col-md-2 style="margin-left: 10px;">
                    <label>Publish Date To</label>
                    <input type="date" class="form-control" value="{{Request::get('publish_date_to')}}"name="publish_date_to">
                   
                  </div>
                   

                   

                    <div class="form-group" col-md-2 style="margin-left: 10px;">
                    <label>Message_To </label>
                      <select class="form-control" name="message_to">
                        <option value="">Select</option>
                        <option {{(Request::get('message_to') == 4)?'selected': '' }} value="4">Student</option>
                        <option {{(Request::get('message_to') == 3)?'selected':'' }} value="3">Parent</option>
                        <option {{(Request::get('message_to') == 2)?'selected':'' }} value="2">Teacher</option>
                        
                      </select>
                  </div>


                  
                  


                   <div class="form-group" col-md-3 style="margin-left: 10px;">
                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                   <a href="{{url('admin/communicate/notice_board')}}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                   
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
                <h3 class="card-title">Notice Board List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Title</th>
                      <th>Notice Date</th>
                      <th>Published Date</th>
                      <th>Message To</th>
                      <th>Created By</th>
                      <th>Created Date</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                  <tbody>
                    @forelse($getRecord as $value)
                    <tr>
                      <td>{{$value->id}}</td>
                      <td>{{$value->title}}</td>
                      <td>{{ date('d-m-Y', strtotime($value->notice_date))}}</td>
                      <td>{{ date('d-m-Y', strtotime($value->publish_date))}}</td>
                      <td>
                        @foreach($value->getMessage as $message)
                        @if($message->message_to == 2)
                        <div>Teacher</div>
                        @elseif($message->message_to == 4)
                        <div>Student</div>
                        @elseif($message->message_to == 3)
                        <div>Parent</div>
                        @endif
                        @endforeach
                      </td>
                      <td>{{$value->created_by_name}}</td>
                      <td>{{ date('d-m-Y', strtotime($value->created_at))}}</td>
                      <td><a href="{{url('admin/communicate/notice_board/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                           <a href="{{url('admin/communicate/notice_board/delete/'.$value->id)}}" class="btn btn-danger">Delete</a></td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="100%">Record not found</td>
                    </tr>
                    @endforelse
                     
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