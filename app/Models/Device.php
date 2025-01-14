<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'details'
    ];
    public function assign_vehicle()
    {
        return $this->hasOne(AssignDevice::class, 'device_id');
    }
    public function location_history()
    {
        return $this->hasMany(LocationHistory::class, 'device_id');
    }
}
