@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Parent Report (Total: {{ $getRecord->total() }})</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Parent List</h3>
                </div>
                <div class="card-body p-0" style="overflow: auto;">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Parent Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Mobile Number</th>
                                <th>Occupation</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Create Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($getRecord as $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->name }} {{ $value->last_name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->gender }}</td>
                                <td>{{ $value->mobile_number }}</td>
                                <td>{{ $value->occupation }}</td>
                                <td>{{ $value->address }}</td>
                                <td>{{ ($value->status == 0) ? 'Active' : 'Inactive' }}</td>
                                <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="padding: 10px; float: right;">
                        {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection