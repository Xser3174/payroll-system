@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Add new Department</h1>
        </div>
        <div class="row">
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