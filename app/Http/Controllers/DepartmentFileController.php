<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\File;
use Illuminate\Http\Request;

class DepartmentFileController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function attach_view(File $file) 
    {
        $departments=Department::all();
        return view('APP.files.create_department_file',compact('file','departments'));
    }

    public function attach(Request $request) //Adds a new relationship to the pivot table
    {
        $request->validate([
            'department_ids' => 'required|array', 
            'department_ids.*' => 'exists:departments,id', 
            'file_id' => 'required|exists:files,id',
        ]);
        
        $file = File::findOrFail($request->file_id);
        $file->departments()->attach($request->department_ids);
        return redirect()->route('files.show',$file)->with('success', 'Departments attached successfully.');
        

    }

    /**
     * Store a newly created resource in storage.
     */
    public function detach(Request $request,$fileId, $departmentId) //Removes a relationship from the pivot table
    {
            $file = File::findOrFail($fileId);
            $file->departments()->detach($departmentId);
            return redirect()->back()->with('success', 'Departments detached successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */

    /* public function sync() //Synchronizes the relationships, adding new ones and removing those not specified in the array
    {

    } */
}
