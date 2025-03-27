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
            'note' => 'required',
        ]);
        $correspondence->accessDepartments()->attach($request->department_ids);
        $correspondence->note=$request->note;

        return redirect()->route('correspondences.show',$correspondence)
        ->with('msg-color','success')
        ->with('message','Accès accordé avec succès');

    }

   
      public function revokeAccess(Correspondence $correspondence, $departmentId) //Removes a  relationship of department acsses 
      {
            $correspondence->accessDepartments()->detach($departmentId);
            return redirect()->back()->with('msg-color','success')
            ->with('message','Accès révoqué avec succès');
        }

      //***************************  Approval  *************************** */  
      
      public function approveView(Correspondence $correspondence )
      {  
            $statuseses = [
            1 => 'Accepté',
            2 => 'Refusé',
            3 => 'Autre',
            ];
          return view('APP.correspondences.department.approval',compact('statuseses','correspondence'));
  
      }

      public function approve(Correspondence $correspondence ,Request $request)
      {  

            $statuseses = [
            1 => 'Accepté',
            2 => 'Refusé',
            3 => 'Autre',
            ];

            $data=$request->validate([
/*          'department_ids' => 'required|array', 
            'department_ids.*' => 'exists:departments,id', 
            |in:Accepte,Refuse,Autre
 */         'message' => 'required',
            'status' => 'required|integer|in:1,2,3',
            ]);
            //$status = $statuseses[$request->input('status')];
            $status = $statuseses[$data['status']];
            //$correspondence->approvedDepartments()->attach(Auth::user()->department_id);
            $correspondence->approvedDepartments()->attach(Auth::user()->department_id, [
            'status' => $status,
            'message' => $data['message'],
           ]);
          return redirect()->back()
          ->with('msg-color','success')
          ->with('message','courriers approuvée avec succès');
  
       
        }

        public function revokeApproval(Correspondence $correspondence,$departmentId)
        {
            $department = Department::findOrFail($departmentId);
            $correspondence->approvedDepartments()->detach($departmentId);
            return redirect()->back()
            ->with('msg-color','success')
            ->with('message','Approbation révoquée avec succès');
        }



    /* public function sync() //Synchronizes the relationships, adding new ones and removing those not specified in the array
    {

    } */
}
