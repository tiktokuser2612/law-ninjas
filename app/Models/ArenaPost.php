<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArenaPost extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'arenagroup_id',
        'user_id',
        'post_description',
        'post_image',
    ];
}
