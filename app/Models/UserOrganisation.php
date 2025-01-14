<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrganisation extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'organisation_id', 'role'];

    public function org()
    {
        return $this->belongsTo(Organisation::class, 'organisation_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
