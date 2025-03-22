<?php

namespace App\Http\Controllers;

use App\Models\Correspondence;
use App\Models\Department;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $files = File::latest()->get();
        
        return view('APP.files.all',compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     */
    /* public function create(Request $request)
    {
        // change this method to insert new files , by ovverride the route and send the correspondenceas param

        $data=$request->validate([
            'correspondence' => 'required|integer|exists:correspondences,id',
        ]);

        $correspondence=Correspondence::findOrfail($data['correspondence']);

        if($correspondence->user_id !== Auth::user()->id ){ // to make sure the the req didnt Manipulated
            abort(403); 
        }

       // dd($correspondence);
        return view('APP.files.create', compact('correspondence'));
    } */

    public function create(Correspondence $correspondence)
    {
        // change this method to insert new files , by ovverride the route and send the correspondenceas param

      /*   $data=$request->validate([
            'correspondence' => 'required|integer|exists:correspondences,id',
        ]);

        $correspondence=Correspondence::findOrfail($data['correspondence']);

        if($correspondence->user_id !== Auth::user()->id ){ // to make sure the the req didnt Manipulated
            abort(403); 
        } */

       // dd($correspondence);
        return view('APP.files.create', compact('correspondence'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request ,Correspondence $correspondence , File $file)
    {
        //dd($correspondence);
        $data=$request->validate([

            'file' => 'required|mimes:jpg,png,pdf,xlx,csv|max:10240' /*Max size 10M*/,
            'title' =>'required',

        ]);

        $data['file'] = time().'.'.$data['file']->extension();  
        $request->file->move(public_path('uploads'), $data['file'] );
        $data['file_path'] = url('uploads/'.$data['file']);
        $data['correspondence_id'] = $correspondence->id;
        
        $file::create($data);

        return redirect()->route('correspondences.show',$correspondence)->with('msg-color','success')
        ->with('message','File uploaded successfully');
        
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
    // Detach the department from the file
    return redirect()->route('files.index')->with('msg-color','danger')
        ->with('message','File deleted successfully');
    
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
