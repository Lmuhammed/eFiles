<?php

namespace App\Http\Controllers;

use App\Models\Correspondence;
use App\Models\Department;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    

    public function create(Correspondence $correspondence)
    {
        return view('APP.files.create', compact('correspondence'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request ,Correspondence $correspondence , File $file)
    {
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
    
    $correspondence=$file->correspondence;
    $file->delete();
    
    return redirect()->route('correspondences.show',$correspondence)->with('msg-color','danger')
        ->with('message','File deleted successfully');
    
    
    }
}
