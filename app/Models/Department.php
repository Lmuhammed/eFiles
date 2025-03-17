<?php

namespace App\Models;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
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
