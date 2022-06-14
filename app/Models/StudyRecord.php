<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudyRecord extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function schedules()
    {
        return $this->hasMany('App\Models\StudySchedule');
    }
}
