<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polling extends Model
{
    use HasFactory;

    protected $fillable =[
        'question_id',
        'option_1',
        'option_2',
        'option_3'
    ];
}
