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
    public function store(Request $request ,Correspondence $correspondence )
    {
        $request->validate([
            'files' => 'required|array',
            'files.*' => 'required|mimes:jpg,png,pdf,xlx,csv|max:10240',
        ]);
 
        $files = [];
  
        foreach($request->file('files') as $file) {

            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
             
            $file->move(public_path('uploads'), $fileName);
  
            $files[] = ['file_path' => $fileName,'title' => 'facture' , 'correspondence_id' => $correspondence->id];
        }
  
        foreach ($files as $fileData) {
            File::create($fileData);
        }

        return redirect()->route('correspondences.show',$correspondence)->with('msg-color','success')
        ->with('message','Fichier téléchargé avec succès');
     
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
        ->with('message','Fichier supprimé avec succès');
    
    
    }
}
