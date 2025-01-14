<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignDevice extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'device_id',
        'vehicle_id'
    ];
    public function vehicle()
    {
        return $this->belongsTo(DeviceVehicle::class, 'vehicle_id',);
    }
    public function device()
    {
        return $this->belongsTo(Device::class, 'device_id');
    }
}
