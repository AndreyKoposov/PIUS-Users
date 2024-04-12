<?php

namespace App\Domain\Users\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Users\Models\Step;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function step()
    {
        return $this->belongsTo(Step::class);
    }
}
