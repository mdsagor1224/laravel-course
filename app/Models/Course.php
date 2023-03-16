<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function platform(){
        return $this->belongsTo(Platform::class);
    }

    public function series(){
        return $this->belongsTo(Series::class);
    }


    public function topics(){
        return $this->belongsToMany(Topic::class, 'course_topic', 'course_id', 'topic_id');
    }

    public function authors(){
        return $this->belongsToMany(Author::class, 'course_author', 'course_id', 'author_id');
    }
}
