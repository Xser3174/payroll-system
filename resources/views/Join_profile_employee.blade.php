<table border="0">
    @foreach($profile as $profile)
        <tr>
            <td>Employee Name </td>
            <td>:{{$profile->employee['name']}}</td>
        </tr>

        <tr>
            <td>Email Address </td>
            <td>:{{$profile->employee['email']}}</td>
        </tr>

        <tr>
            <td>Position ID </td>
            <td>:{{$profile->employee['position_id']}}</td>
        </tr>

        <tr>
            <td>salary </td>
            <td>:{{$profile->employee['salary']}}</td>
        </tr>

        <tr>
            <td>Age </td>
            <td>:{{$profile->age}}</td>
        </tr>

        <tr>
            <td>Height </td>
            <td>:{{$profile->height}}</td>
        </tr>

        <tr>
            <td>Father Name </td>
            <td>:{{$profile->father_name}}</td>
        </tr>

        <tr>
            <td>Profile_Id </td>
            <td>:{{$profile->id}}</td>
        </tr>

        <tr>
            <td>Employee_Id </td>
            <td>:{{$profile->employee_id}}</td>
        </tr>

    @endforeach
</table>