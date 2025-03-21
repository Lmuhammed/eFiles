<?php

namespace App\Models;

use App\Models\Correspondence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function employees()
    {
        return $this->hasMany(User::class);
    }
   
    // departments correspondence
    
    public function correspondenceAcsses()
    {
        return $this->belongsToMany(Correspondence::class, 'correspondence_department_access')
                    ->withTimestamps();
    }

    public function correspondenceApproved()
    {
        return $this->belongsToMany(Correspondence::class, 'correspondence_department_approval')
                    ->withTimestamps();
    }

}
