<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

//file Export and Import ***
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EmployeesImport;
use App\Exports\EmployeesExport;
use App\Imports\UsersImport;

// Create pdf
use PDF;


use App\Position;
use App\Employee;

class EmployeeController extends Controller
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
        $positions=DB::table('positions')->get();
        return view('employee',['positions'=>$positions,
                                'employees'=>$employees
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
        $employee = new Employee();
        $employee->name = $request['employee_name'];
        $employee->position_id = $request['id'];
        $employee->email = $request['email'];
        $employee->salary = $request['employee_salary'];


        $employee->save();
        return redirect('/employee');
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

    //     public function fileImportExport()
    // {
    //     return view('file-import');
    
    // }
        /**
         * @return \Illuminate\Support\Collection
         */
    public function fileImport(Request $request)
    {
        Excel::import(new EmployeesImport, $request->file('file')->store('temp'));
        
    
    
        return back();
    }
        /**
         * @return \Illuminate\Support\Collection
         */
    public function fileExport()
    {
        
        return Excel::download(new EmployeesExport,
        'EmployeeList.xlsx');
    } 

    public function fileExportCrv()
    {
        return Excel::download(new EmployeesExport,
        'EmployeeList.csv');
    } 

    public function createPDF() {
        // retreive all records from db
        $data = Employee::all();
        
        // share data to view
        view()->share('employee',$data);
        $pdf = PDF::loadView('pdf_view', $data);
        
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
        }
       
}
