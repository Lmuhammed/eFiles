<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     ->with('msg-color','success') danger
            ->with('message','__');
     */
    public function index()
    {
        $files = File::latest()->get();
        
        return view('APP.dashbord',compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('APP.files.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request ,File $file)
    {

        $data=$request->validate([

            'file' => 'required|mimes:jpg,png,pdf,xlx,csv|max:10240',
            'title' =>'required',

        ]);

        $data['file'] = time().'.'.$data['file']->extension();  
        $request->file->move(public_path('uploads'), $data['file'] );
        $data['file_path'] = url('uploads/'.$data['file']);
        $data['user_id'] = Auth::id();

        $file::create($data);

        return redirect()->route('files.index')->with('success', 'File uploaded successfully!');
        
        /* 
        return back()->with('success', 'File uploaded successfully!')
        ->with('file', $data['file']); 
        */
    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        $fileDepartments = $file->load('departments');
        $departments=$fileDepartments->departments;
        $fileApprovals = $file->load('approvedDepartments');
        $approvedDepartments=$fileApprovals->approvedDepartments;
        return view('APP.files.view', compact('file','departments','approvedDepartments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, File $file)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        $file->delete();
    // Find the file by its ID
    $file = File::findOrFail($fileId);
    // Detach the department from the file
    $file->departments()->detach($departmentId);    
    
    }

    public function sent()
    {
        $files = Auth::user()->files; 
        return view('APP.files.sent',compact('files'));
    }

    public function received()
    {
        $user = Auth::user();
        $department = $user->department;
        $departmentFiles = $department->load('files');
        $files = $departmentFiles->files; 
        return view('APP.files.received',compact('files'));
    }
}
