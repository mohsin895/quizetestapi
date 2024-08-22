<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizeDetails extends Model
{
    use HasFactory;

    public function questionInfo()
    {
        return $this->hasMany('App\Models\Question','quize_details_id','id');
    }

    public function totalMarksInfo()
    {
        return $this->hasOne('App\Models\Question','quize_details_id','id');
    }
    public function totalMarksInfoStudent()
    {
        return $this->hasOne('App\Models\UserAnswer','quize_details_id','id');
    }
}

