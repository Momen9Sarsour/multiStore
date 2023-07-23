<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeAdmin;
use App\Models\EemployeeAdmin;
use Illuminate\Support\Facades\Redirect;

class EmployeeAdminController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('employee');
        // $this->middleware('admin');
        //$this->middleware('auth', ['except' => ['index','show']]);
        //$this->middleware('employee', ['except' => ['index','show']]);
        //$this->middleware('admin', ['except' => ['index','show']]);
    }
    // index
    public function employeesList()
    {
        $employee = EmployeeAdmin::all();
        return view('adminStore.employee.employeeList',compact('employee'));
    }
    //create
    public function createEmployee()
    {
        return view('adminStore.employee.create');
    }
    //store
    public function store(Request $request)
    {
        //validate data
        $request->validate([
            'name' => 'required',
            'image' => 'nullable',
            'phone' => 'required',
            'address' => 'nullable',
            'employeeEmail' => 'required',
            'ipan' => 'nullable',
        ]);
        // image add path
        $image = rand() . time() . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images/uploads'), $image);

        //store data
        $employee = new EmployeeAdmin();
        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->email = $request->employeeEmail;
        $employee->image = $image;
        $employee->ipan = $request->ipan;
        $employee->save();

        //session message
        session()->flash('message', 'Employee added!');
        //redirect
        return redirect()->route('admin/employee');
    }
    //edit
    public function edit($id)
    {
        //find object
        $employee = EmployeeAdmin::findOrFail($id);
        //return view and pass object
        return view('adminStore.employee.edit', compact('employee'));
    }
    //update
    public function update(Request $request, $id)
    {
        //validate data
        $request->validate([
            'name' => 'required',
            'image' => 'nullable',
            'phone' => 'required',
            'address' => 'nullable',
            'employeeEmail' => 'required',
            'ipan' => 'nullable',
        ]);
        // image add path
        $image = rand() . time() . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images/uploads'), $image);
        //update data
        $employee = EmployeeAdmin::find($id);
        $employee->name = $request->name;
        $employee->image = $image;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->email = $request->employeeEmail;
        $employee->ipan = $request->ipan;
        $employee->save();

        //session message
        session()->flash('message', 'Employee updated!');
        //redirect
        return redirect()->route('admin/employee');
    }
    //delete
    public function destroy($id)
    {
        // delete employee
        EmployeeAdmin::destroy($id);
        //delete image
        if ($image = EmployeeAdmin::find($id)) {
            unlink(public_path(). $image);
        }
        //session message
        session()->flash('message', 'Employee deleted! & image deleted!');
        //redirect
        return redirect()->route('admin/employee');
    }

}

    // //delete all image
    // if (file_exists(public_path('images/ups'))) {
    //     $files = glob(public_path('images/ups/*'));
    //     foreach ($files as $file) {
    //         unlink($file);
    //         //session message
    //         session()->flaow('All image deleted!');
    //         //redirect
    //         return view('adminStore.employee.employeeList');
    //     }
    // }
