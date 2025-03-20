<?php

namespace App\Models;

use App\Models\File;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Correspondence extends Model
{
    
    
    protected $fillable = [
        'code',
        'source',
        'destination',
        'object',
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
}
