<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


#[Fillable(['customer_id', 'order_date', 'total_amount'])]
class Order extends Model
{
    public function customer() : BelongsTo 
    {
        return $this->belongsTo(Customer::class);
    }

    public function products() : BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity')->withTimestamps();
    }
}