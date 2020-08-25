@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Add new Employee</h1>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form action="employee" method="post">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            Please fix the following errors
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="employee_name">Employee Name</label>
                        <input type="text" class="form-control @error('position_name') is-invalid @enderror" id="employee_name" name="employee_name" placeholder="Employee Name" value="{{ old('employee_name') }}">
                        @error('"employee_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="position_id">Position Name</label>
                        <select name='id'>
                            @foreach ($positions as $position)
                                <option name='id' value="{{$position->id
                                                        }}">
                                {{$position->position_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email </label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>

                    <div class="form-group">
                        <label for="employee_salary">Salary</label>
                        <input type="integer" class="form-control" id="employee_salary" name="employee_salary">
                    </div>

                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
                <div style="text-align: right;">
                    <a class="btn btn-success" href="{{route('fileexport')}}">Export Data</a>
                </div>
            </div>
            <div class="col-md-6">
                <form action="{{ route('fileimport') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                            <div class="custom-file text-left">
                                <input type="file" name="file" id="customFile" >
                                <!-- <label class="custom-file-label" for="customFile">Choose file</label> -->
                            </div>
                        </div>
                        <button class="btn btn-primary">Import data</button>
                </form>

                <div style="text-align: right;">
                    <a class="btn btn-primary" href="{{ URL::to('/employee/pdf') }}">Export to PDF</a>
                </div>
                    
            </div>
        </div>
        <div class="row">
            <table class="table table-responsive common-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Employee Name</th>
                        <th>Email</th>
                        <th>Salary</th>
                        <th>Position_id</th>
                        <th>Created Date</th>
                        <th>Updated Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->salary }}</td>
                            <td>{{ $employee->position_id }}</td>
                            <td>{{ $employee->created_at }}</td>
                            <td>{{ $employee->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection