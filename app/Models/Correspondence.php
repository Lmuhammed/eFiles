<?php

namespace App\Models;

use App\Models\File;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Correspondence extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'code',
        'source',
        'destination',
        'object',
        'note',
        'date',
        'user_id',

    ];

    
    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    
    }

     // departments department
    
    public function accessDepartments()
     {
         return $this->belongsToMany(Department::class, 'correspondence_department_access')
                     ->withTimestamps();
     }
    public function approvedDepartments()
     {
         return $this->belongsToMany(Department::class, 'correspondence_department_approval')
                    ->withPivot('status', 'message')
                     ->withTimestamps();
     }
 
    
}
