<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['customer_id', 'date_of_birth', 'bio'])]

class Profile extends Model
{
    public function customer() : BelongsTo 
    {
        return $this->belongsTo(Customer::class);
    }
}