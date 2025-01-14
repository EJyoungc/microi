<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceVehicle extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'vehicle_make',
        'vehicle_model',
        'organisation_id',
        'make_year',
        'vin',
        'mileage',
        'fuel_type',
        'on_sale'
    ];
    public function org()
    {
        return $this->belongsTo(Organisation::class, 'organisation_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function device()
    {
        return $this->belongsTo(Device::class, 'device_id');
    }
    public function location_history()
    {
        return $this->hasMany(LocationHistory::class, 'device_id');
    }
    // public function org()
    // {
    //     return $this->belongsTo(Organisation::class, 'organisation_id');
    // }
}
