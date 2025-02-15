@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
             
               <div class="col-sm-6">
                    <h1>Student Report (Total : {{ $getRecord->total() }})</h1>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <a href="{{ url('admin/student/list') }}" class="btn btn-primary">Back to Student List</a>
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Student Report</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0" style="overflow: auto;">
                            <table class="table table-striped">
                                <thead>
                                    <tr style="font-size: 12px;">
                                        <th>#</th>
                                        <th style="min-width: 150px;">Student Name</th>
                                        <th>Parent Name</th>
                                        <th>Email</th>
                                        <th>Admission Number</th>
                                        <th>Roll Number</th>
                                        <th>Class</th>
                                        <th>Gender</th>
                                        <th style="min-width: 100px;">Date of Birth</th>
                                        <th>Caste</th>
                                        <th>Religion</th>
                                        <th>Mobile Number</th>
                                        <th style="min-width: 100px;">Admission Date</th>
                                        <th>Hobbies</th>
                                        <th>Blood Group</th>
                                        <th>Height</th>
                                        <th>Weight</th>
                                        <th>Status</th>
                                        <th style="min-width: 100px;">Create Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($getRecord as $value)
                                        <tr style="font-size: 12px;">
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->name }} {{ $value->last_name }}</td>
                                            <td>{{ $value->parent_name }} {{ $value->parent_last_name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->admission_number }}</td>
                                            <td>{{ $value->roll_number }}</td>
                                            <td>{{ $value->class_name }}</td>
                                            <td>{{ $value->gender }}</td>
                                            <td>{{ $value->date_of_birth }}</td>
                                            <td>{{ $value->caste }}</td>
                                            <td>{{ $value->religion }}</td>
                                            <td>{{ $value->mobile_number }}</td>
                                            <td>{{ $value->admission_date }}</td>
                                            <td>{{ $value->hobbies }}</td>
                                            <td>{{ $value->blood_group }}</td>
                                            <td>{{ $value->height }}</td>
                                            <td>{{ $value->weight }}</td>
                                            <td>{{ $value->status == 0 ? 'Active' : 'Inactive' }}</td>
                                            <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
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
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection