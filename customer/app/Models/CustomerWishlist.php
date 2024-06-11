<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerWishlist extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'store_id', 'product_id', 'date_added'];
    protected $primaryKey = ['customer_id', 'store_id', 'product_id'];
    public $incrementing = false;

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'store_id');
    }
}
