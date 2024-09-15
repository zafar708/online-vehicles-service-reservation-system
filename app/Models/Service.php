<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'staff_id', 'service_station_id', 'slug', 'title', 'price'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
    public function serviceStation()
    {
        return $this->belongsTo(ServiceStation::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
