<?php

namespace App\Models;

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'correspondence_id',
    ];

    public function correspondence()
    {
        return $this->belongsTo(Correspondence::class);
    }

   



}
