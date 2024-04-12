<?php

namespace App\Domain\Users\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Users\Models\Enrollment;
use App\Domain\Users\Models\Step;
use App\Domain\Users\Models\Review;

class Enrollment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function steps()
    {
        return $this->hasMany(Step::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
