<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrectAnswer extends Model
{
    use HasFactory;
    protected $fillable = [
        'question_id', 
        'attribute_id', 
        'answer', 
        'marks'
    ];
    public function questionAttributeInfo()
    {
        
        return $this->hasOne('App\Models\QuestionAttributes', 'id', 'attribute_id');
    }
}
