<?php

namespace App\Http\Controllers;

use App\Models\Correspondence;
use App\Models\Department;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CorrespondenceController extends Controller
{
    
    
    public function search(Request $request)
     {
         $request->validate([
             'search' => 'nullable|string',
         ]);
 
         $query = Correspondence::query();
 
         if ($request->filled('search')) {
             $searchTerm = $request->search;
             $query->where(function($q) use ($searchTerm) {
                 $q->where('source', 'like', '%' . $searchTerm . '%')
                   ->orWhere('destination', 'like', '%' . $searchTerm . '%')
                   ->orWhere('code', 'like', '%' . $searchTerm . '%');

             });
         }
 
         $correspondences = $query->paginate(7);
 
         return view('APP.correspondences.all', compact('correspondences'));
    }
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $correspondences = Correspondence::latest()->paginate(7);
        return view('APP.correspondences.all',compact('correspondences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = ['Informationnel', 'Urgent', 'Routinière'];
        $types = ['Lettre', 'Facture', 'Rapport', 'Recommandation'];
        return view('APP.correspondences.create',compact('statuses','types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request ,Correspondence $Correspondence)
    {
        $data=$request->validate([

            'code' => ['required','unique:correspondences'],
            'source' =>'required',
            'destination' => 'required',
            'object' =>'required',
            'status' =>'required',
            'type' =>'required',
            'date' =>'required|date',
            'files' => 'required|array',
            'files.*' => 'required|mimes:jpg,png,pdf,xlx,csv|max:10240',

        ]);

        $data['user_id'] = Auth::id();

        $correspondence=$Correspondence::create($data);
        $correspondenceId = $correspondence->id; // Access the ID of the newly created record

        //files
        $files = [];
  
        foreach($request->file('files') as $file) {

            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
             
            $file->move(public_path('uploads'), $fileName);
  
            $files[] = ['name' => $fileName, 'correspondence_id' => $correspondenceId];
        }
  
        foreach ($files as $fileData) {
            File::create($fileData);
        }
        return redirect()->route('correspondences.index')->with('msg-color','success')
        ->with('message','courriers Envoyé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Correspondence $correspondence)
    {
        $files=$correspondence->files;
        return view('APP.correspondences.view', compact('correspondence','files'));
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
        ->with('message','courriers supprimée avec succès');
    
    }

    public function sent()
    {
        $correspondences = Auth::user()->correspondences()->paginate(7);
        return view('APP.correspondences.sent',compact('correspondences'));
    }

    public function received()
    {
        $user = Auth::user();
        $department = $user->department;
        $departmentCorrespondences = $department->load('correspondenceAcsses');
        $correspondences = $departmentCorrespondences->correspondenceAcsses()->paginate(7);
        return view('APP.correspondences.received',compact('correspondences'));
    }

    
}