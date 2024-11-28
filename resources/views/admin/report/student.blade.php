@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Student Report</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Student Details</h3>
                </div>
                <div class="card-body p-0" style="overflow: auto;">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Student Name</th>
                                <th>Parent Name</th>
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
                                <th>Status</th>
                                <th>Create Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->name }} {{ $student->last_name }}</td>
                                <td>{{ $student->parent ? $student->parent->name . ' ' . $student->parent->last_name : 'N/A' }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->admission_number }}</td>
                                <td>{{ $student->roll_number }}</td>
                                <td>{{ $student->class ? $student->class->name : 'N/A' }}</td>
                                <td>{{ $student->gender }}</td>
                                <td>{{ $student->date_of_birth }}</td>
                                <td>{{ $student->caste }}</td>
                                <td>{{ $student->religion }}</td>
                                <td>{{ $student->mobile_number }}</td>
                                <td>{{ $student->admission_date }}</td>
                                <td>{{ $student->hobbies }}</td>
                                <td>{{ $student->blood_group }}</td>
                                <td>{{ $student->height }}</td>
                                <td>{{ $student->weight }}</td>
                                <td>{{ $student->status == 0 ? 'Active' : 'Inactive' }}</td>
                                <td>{{ date('d-m-Y H:i A', strtotime($student->created_at)) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>
@endsection