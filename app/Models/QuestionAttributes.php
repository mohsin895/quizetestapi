<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionAttributes extends Model
{
    use HasFactory;
    protected $fillable = [
        'question_id',
        'question_number',
        'question_option',
        // Add any other fields you want to be mass-assignable
    ];
    public function optionAnserInfo()
    {
        return $this->hasOne('App\Models\UserAnswer','option_id','id');
    }
}
