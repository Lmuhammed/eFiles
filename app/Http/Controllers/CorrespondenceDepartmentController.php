<?php

namespace App\Http\Controllers;

use App\Models\Correspondence;
use App\Models\Department;
use Illuminate\Http\Request;

class CorrespondenceDepartmentController extends Controller
{
        //***************************  Access  *************************** */  


    public function grantAccessView(Correspondence $correspondence) 
    {
        $departments=Department::all();
        return view('APP.correspondence_department.create',compact('correspondence','departments'));
    }

    public function grantAccess(Request $request, Correspondence $correspondence ) //add a relationship of department acsses 
    {
        $request->validate([
            'department_ids' => 'required|array', 
            'department_ids.*' => 'exists:departments,id', 
        ]);
//        'file_id' => 'required|exists:files,id',
        //$file = File::findOrFail($request->file_id);
        $correspondence->accessDepartments()->attach($request->department_ids);
        return redirect()->route('correspondences.show',$correspondence)
        ->with('msg-color','success')
        ->with('message','Access granted successfully');

    }

   
    public function revokeAccess(Request $request,Correspondence $correspondence, $departmentId) //Removes a  relationship of department acsses 
    {
            $correspondence->accessDepartments()->detach($departmentId);
            return redirect()->back()->with('msg-color','success')
            ->with('message','Access revoked successfully');
    }

    //***************************  Approval  *************************** */  
    // Mark a file as approved by a department
        public function approveFileView(File $file) 
        {
        $departments=Department::all();
        return view('APP.department_file.approve',compact('file','departments'));
        }

      public function approveFile(File $file,$departmentId )
      {
            /*
            $request->validate([
            'department_id' => 'required|exists:departments,id',
            ]);
            $file = File::findOrFail($fileId);
            */  
        
         $department = Department::findOrFail($departmentId);
  
          // Attach the department to the file for approval
          $file->approvedDepartments()->attach($department->id);

          return redirect()->back()->with('success', 'File approved by departments  successfully.');
  
       
        }

        public function revokeApproval(FILE $file,$departmentId)
        {
    
            $department = Department::findOrFail($departmentId);
    
            // Detach the department from the file for approval
            $file->approvedDepartments()->detach($departmentId);
            return redirect()->back()->with('success', 'Approval revoked successfully.');
        }



    /* public function sync() //Synchronizes the relationships, adding new ones and removing those not specified in the array
    {

    } */
}
