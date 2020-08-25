@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
                <h1>Add new Department</h1>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <form action="position" method="post">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                Please fix the following errors
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="position_name">Position Name</label>
                            <input type="text" class="form-control @error('position_name') is-invalid @enderror" id="position_name" name="position_name" placeholder="position Name" value="{{ old('position_name') }}">
                            @error('department_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="department_id">department_id</label>
                            <select name='id'>
                                @foreach ($departments as $department)
                                    <option name='id' value="{{$department->id}}">{{$department->department_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                    <div style="text-align: right;">
                            <a class="btn btn-success" href="{{route('exportposition')}}">Export Data XLXS</a>
                    </div>
                    <div style="text-align: right;">
                            <a class="btn btn-success" href="{{url('file-export/csv')}}">Export Data CSV</a>
                    </div>
                </div>
                <div class="col-md-6">
                <form action="{{ route('importposition') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                            <div class="custom-file text-left">
                                <input type="file" name="file" id="customFile" >
                                <!-- <label class="custom-file-label" for="customFile">Choose file</label> -->
                            </div>
                        </div>
                        <button class="btn btn-primary">Import data</button>
                    </form>
            </div>
        </div>
        <div class="row">
            <table class="table table-responsive common-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Position Name</th>
                        <th>Department_Id</th>
                        <th>Department_Name</th>
                        <th>Created Date</th>
                        <th>Updated Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($positions as $position)
                        <tr>
                            <td>{{ $position->id }}</td>
                            <td>{{ $position->position_name }}</td>
                            <td>{{ $position->department_id }}</td>

                            <td>{{ $position->department['department_name'] }}</td>

                            <td>{{ $department->created_at }}</td>
                            <td>{{ $department->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection