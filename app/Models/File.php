<?php

namespace App\Models;

use App\Models\Approval;
use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'title',
        'file_path',
        'requires_approval',
        'approval_deadline',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'');
    }

    public function approvals()
    {
        return $this->hasMany(Approval::class);
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class);
    }


}
