<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceStation extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'name', 'slug', 'phone', 'location', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function staff()
    {
        return $this->hasMany(Staff::class);
    }
    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
