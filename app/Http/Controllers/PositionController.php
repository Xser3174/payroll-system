<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

// File Export & Import ***
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PositionsImport;
use App\Exports\PositionsExport;
use App\Imports\UsersImport;

use App\Position;
use App\Department;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $departments=DB::table('departments')->get();
        // $positions=DB::table('positions')->paginate(3);
        // return view('position',['departments'=>$departments,
        //                         'positions'=>$positions
        // ]);

        $position = Position::with('department')->get(); // model function name => /department
        // foreach ($position as $pos) {
        //     print_r($pos->department['department_name']);
        // }
        return view('position',['departments'=>$departments,
                                'positions'=>$position
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
        $position = new Position();
        $position->position_name = $request['position_name'];
        $position->department_id = $request['id'];

        $position->save();
        return redirect('/position');

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
        //
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

    public function fileImport(Request $request)
    {
        Excel::import(new PositionsImport, $request->file('file')->store('temp'));
        
    
    
        return back();
    }
        /**
         * @return \Illuminate\Support\Collection
         */
    public function fileExport()
    {
        return Excel::download(new PositionsExport,
        'positionList.xlsx');
    } 
    public function crvFile()
    {
        return Excel::download(new PositionsExport,
        'positionList.csv');
    } 
}
