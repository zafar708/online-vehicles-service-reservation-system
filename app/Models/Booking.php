<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'service_admin_id', 'vehicle_id', 'service_id', 'name', 'email', 'phone', 'address', 'status', 'book_date', 'book_time'];
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
