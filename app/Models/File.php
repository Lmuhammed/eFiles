<?php

namespace App\Models;

use App\Models\Approval;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'title',
        'file_path',
        'requires_approval',
        'approval_deadline',
        'uploaded_by',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function approvals()
    {
        return $this->hasMany(Approval::class);
    }

}
