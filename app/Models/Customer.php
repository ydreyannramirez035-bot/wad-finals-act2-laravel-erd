<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name'])]
class Customer extends Model
{
    public function profile() : HasOne 
    {
        return $this->hasOne(Profile::class);
    }

    public function orders() : HasMany
    {
        return $this->hasMany(Order::class);
    }
}
