<?php

namespace App\Domain\Users\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Users\Models\Enrollment;
use App\Domain\Users\Models\Comment;

class Step extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }

    
    public function comments() 
    {
        return $this->hasMany(Comment::class);
    }
}
