<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Correspondence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CorrespondenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $correspondences = Correspondence::latest()->get();
        return view('APP.correspondences.all',compact('correspondences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = ['Informational', 'Urgent', 'Routine'];
        $types =  ['Letter', 'Invoice', 'Report','Recommendation'];
        return view('APP.correspondences.create',compact('statuses','types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request ,Correspondence $Correspondence)
    {
        $data=$request->validate([

            'code' => 'required',
            'source' =>'required',
            'destination' => 'required',
            'object' =>'required',
            'status' =>'required',
            'type' =>'required',

        ]);

        $data['user_id'] = Auth::id();

        $Correspondence::create($data);

        return redirect()->route('correspondences.index')->with('msg-color','success')
        ->with('message','Correspondence uploaded successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Correspondence $correspondence)
    {
        return view('APP.correspondences.view', compact('correspondence'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Correspondence $Correspondence)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Correspondence $Correspondence)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Correspondence $Correspondence)
    {
    
    $Correspondence->delete();
    return redirect()->route('correspondences.index')->with('msg-color','danger')
        ->with('message','Correspondence deleted successfully');
    
    }

    public function sent()
    {
        $correspondences = Auth::user()->correspondences; 
        return view('APP.correspondences.sent',compact('correspondences'));
    }

    public function received()
    {
        $user = Auth::user();
        $department = $user->department;
        $departmentCorrespondences = $department->load('correspondenceAcsses');
        $correspondences = $departmentCorrespondences->correspondenceAcsses; 
        return view('APP.correspondences.received',compact('correspondences'));
    }
}