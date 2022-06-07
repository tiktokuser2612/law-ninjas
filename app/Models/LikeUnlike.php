<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeUnlike extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'post_id',
        'user_id',
        'status',
    ];
}
