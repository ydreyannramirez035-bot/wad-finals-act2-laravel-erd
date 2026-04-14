<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'order_date',
        'total_amount'
    ];
    public function customer() : BelongsTo 
    {
        return $this->belongsTo(Customer::class);
    }

    public function products() : BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity')->withTimestamps();
    }
}