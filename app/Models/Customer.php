<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    protected $fillable = [
        'user_id',
        'name',
    ];
    public function profile() : HasOne 
    {
        return $this->hasOne(Profile::class);
    }

    public function orders() : HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
