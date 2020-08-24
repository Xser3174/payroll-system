<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Profile;
use App\Employee;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees=DB::table('employees')->get();
        $profiles=DB::table('profiles')->get();
        return view('profile',['employees'=>$employees,
                                'profiles'=>$profiles
                                
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

        // dd($request);
        $profiles = new Profile();
        $profiles->employee_id = $request['id'];
        $profiles->age = $request['age'];
        $profiles->height = $request['height'];
        $profiles->father_name = $request['father_name'];

        $profiles->save();
        return redirect('/profile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        //  $edit=Employee::find($id)->get();
         $join=Profile::find($id)::with('employee')->where('id','=',$id)->get();
        // dd($join);
         
        return view('Join_profile_employee',['profile'=>$join]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
