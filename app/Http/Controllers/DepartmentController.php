<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;


class DepartmentController extends Controller
{
    public function index()
{
    $departments = Department::latest()->paginate(7);
    return view('APP.admin.departments.all', compact('departments'));
}

public function create()
{
    return view('APP.admin.departments.create');
}

public function store(Request $request)
{
    $data = $request->validate([
        'name' => [ 'required' , 'string' ,'max:20','unique:departments' ],
    ]);

    Department::create($data);
    return redirect()->route('departments.index')->with('msg-color', 'success')
        ->with('message', 'Départements ajoutés avec succès');
}

public function edit(Department $department)
{
    return view('APP.admin.departments.edit', compact('department'));
}

public function update(Request $request, Department $department)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $department->update($data);
    return redirect()->route('departments.index')->with('msg-color', 'success')
        ->with('message', 'Départements mis à jour avec succès');
}

public function destroy(Department $department)
{
    $department->delete();
    return redirect()->route('departments.index')->with('msg-color', 'danger')
        ->with('message', 'Départements supprimés avec succès');
}

}

