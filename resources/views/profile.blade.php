@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Add new Profile</h1>
        </div>
        <div class="row">
            <form action="profile" method="post">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Please fix the following errors
                    </div>
                @endif
                <!-- <div class="form-group">
                    <label for="employee_name">Employee Name</label>
                    <input type="text" class="form-control @error('position_name') is-invalid @enderror" id="positio"employee_namen_name" name="employee_name" placeholder="Employee Name" value="{{ old('"employee_name') }}">
                    @error('"employee_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> -->

                <div class="form-group">
                    <label for="id">Position ID</label>
                    <select name='id'>
                        @foreach ($employees as $employee)
                            <option name='id' value="{{$employee->id}}">{{$employee->name}}</option>
                        @endforeach
                    </select>
                </div> 

                

                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="integer" class="form-control" id="age" name="age">
                </div>

                <div class="form-group">
                    <label for="height">Height</label>
                    <input type="integer" class="form-control" id="height" name="height">
                </div>

                  <div class="form-group">
                    <label for="father_name">Father Name</label>
                    <input type="text" class="form-control @error('father_name') is-invalid @enderror" id="father_name" name="father_name" placeholder="Father Name" value="{{ old('father_name') }}">
                    @error('"employee_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Add</button>
            </form>

        </div>
        <div class="row">
            <table class="table table-responsive common-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Employee Id</th>
                        <th>Age</th>
                        <th>Height</th>
                        <th>Father Name</th>
                        <th>Created Date</th>
                        <th>Updated Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>{{ $profile->id }}</td>
                            <td><a href="{{route('profileShow',$profile->employee_id)}}">{{ $profile->employee_id }}</a></td>
                            <td>{{ $profile->age }}</td>
                            <td>{{ $profile->height }}</td>
                            <td>{{ $profile->father_name }}</td>
                            <td>{{ $profile->created_at }}</td>
                            <td>{{ $profile->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection