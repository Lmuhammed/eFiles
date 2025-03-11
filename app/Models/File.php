<?php

namespace App\Models;

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

    public function employe()
    {
        return $this->hasMany(User::class);
    }

}
