<?php

namespace App\Http\Controllers;

use App\Models\Correspondence;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CorrespondenceDepartmentController extends Controller
{
    //***************************  Access  *************************** */  
    public function grantAccessView(Correspondence $correspondence) 
    {
        $departments=Department::all();
        return view('APP.correspondences.department.create',compact('correspondence','departments'));
    }

    public function grantAccess(Request $request, Correspondence $correspondence ) //add a relationship of department acsses 
    {
        $request->validate([
            'department_ids' => 'required|array', 
            'department_ids.*' => 'exists:departments,id', 
        ]);
        $correspondence->accessDepartments()->attach($request->department_ids);
        return redirect()->route('correspondences.show',$correspondence)
        ->with('msg-color','success')
        ->with('message','Access granted successfully');

    }

   
      public function revokeAccess(Correspondence $correspondence, $departmentId) //Removes a  relationship of department acsses 
      {
            $correspondence->accessDepartments()->detach($departmentId);
            return redirect()->back()->with('msg-color','success')
            ->with('message','Access revoked successfully');
        }

      //***************************  Approval  *************************** */  
      
      public function approve(Correspondence $correspondence )
      {  
          // Attach the department to the file for approval
          $correspondence->approvedDepartments()->attach(Auth::user()->department_id);
          return redirect()->back()
          ->with('msg-color','success')
          ->with('message','correspondence approved  successfully');
  
       
        }

        public function revokeApproval(Correspondence $correspondence,$departmentId)
        {
            $department = Department::findOrFail($departmentId);
            $correspondence->approvedDepartments()->detach($departmentId);
            return redirect()->back()
            ->with('msg-color','success')
            ->with('message','Approval revoked successfully');
        }



    /* public function sync() //Synchronizes the relationships, adding new ones and removing those not specified in the array
    {

    } */
}
