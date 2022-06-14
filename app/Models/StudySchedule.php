<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudySchedule extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function record()
    {
        return $this->belongsTo('App\Models\StudyRecord', 'study_record_id');
    }
}
