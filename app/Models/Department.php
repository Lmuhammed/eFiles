<?php

namespace App\Models;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'department_name',
    ];

    public function employee()
    {
        return $this->hasMany(User::class);
    }
   
    public function files()
    {
        return $this->belongsToMany(File::class, 'department_file_access')
                    ->withTimestamps();
    }

    public function approvedFiles()
    {
        return $this->belongsToMany(File::class, 'department_file_approval')
                    ->withTimestamps();
    }

}
