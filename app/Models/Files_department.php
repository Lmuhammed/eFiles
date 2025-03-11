<?php

namespace App\Models;

use App\Models\Department;
use App\Models\File;
use Illuminate\Database\Eloquent\Model;

class Files_department extends Model
{
    public function files()
    {
        return $this->belongsTo(File::class);
    }

    public function departments()
    {
        return $this->belongsTo(Department::class);
    }
}
