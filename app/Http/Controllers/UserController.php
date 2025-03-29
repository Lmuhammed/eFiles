<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function all(Request $request)
    {
        $query = User::query();

        if ($request->input('show_inactive')) {
            $query->where('is_active', false);
        }
    
        if($request->input('role') !== '' ){

        if ($request->input('role') === 'manager') {
            $query->orWhere('role', 'manager');
        }
        elseif($request->input('role') === 'admin'){
            $query->orWhere('role', 'admin');
            
        }
        elseif($request->input('role') === 'employee'){
            $query->orWhere('role', 'employee');
        }
         }
    
    
        
        $users = $query->orderBy('created_at', 'desc')->get();
    
        //$users = User::latest()->paginate(7);
        return view('APP.admin.users.all', compact('users'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('APP.admin.users.create',compact('departments'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:30','min:5'],
            'user_name' => ['required', 'string','min:4', 'max:20','unique:users'],
            'password' => 'required|string|min:8',
            'department_id' => 'required','exists:departments,id',

        ]);

        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect()->route('users.index')->with('msg-color', 'success')
            ->with('message', 'Utilisateur ajouté avec succès');
    }

    public function activate(User $user)
    {
        $user->is_active=true;
        $user->save();
        $users = User::all();
        return view('APP.admin.users.all', compact('users'))->with('msg-color', 'success')
        ->with('message', 'L\'utilisateur a été activé avec succès');
    }

    public function disactivate(User $user)
    {
       
        $user->is_active=false;
        $user->save();
        $users = User::all();
        return view('APP.admin.users.all', compact('users'))->with('msg-color', 'success')
        ->with('message', 'L\'utilisateur a été désactivé avec succès');
    }

    public function edit(User $user)
    {
        $departments = Department::all();
        return view('APP.admin.users.edit', compact('user','departments'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8',
            'department_id' => 'nullable',

        ]);

        if ($request->filled('password')) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);
        return redirect()->route('users.index')->with('msg-color', 'success')
            ->with('message', 'Utilisateur mis à jour avec succès');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('msg-color', 'danger')
            ->with('message', 'Utilisateur supprimé avec succès');
    }


    
}
