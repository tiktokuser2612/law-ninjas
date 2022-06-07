<?php

namespace App\Models;
use \Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    use HasFactory;
    protected $fillable = [
        'videos',
        'title', 
        'description',
        'thumbnail',
        'status',
        'price',
        'price_type',
        
    ];
    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d\TH:i:s.000000\Z', $date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d\TH:i:s.000000\Z', $date)->format('Y-m-d H:i:s');
    }
}
