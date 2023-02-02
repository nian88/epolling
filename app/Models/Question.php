<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        "question",
        "option_1",
        "option_2",
        "option_3",
        "is_publish"
    ];

    protected $casts = [
        "is_publish" => "boolean"
    ];

    public function scopePublished($query)
    {
        return $query->where(["is_publish" => true]);
    }

    public function polling(){
        return $this->hasOne(Polling::class,'question_id', 'id');
    }

}
