<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'slug', 'service_station_id', 'name', 'phone', 'address'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function serviceStation()
    {
        return $this->belongsTo(ServiceStation::class);
    }
}
