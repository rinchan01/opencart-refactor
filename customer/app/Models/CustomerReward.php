<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerReward extends Model
{
    use HasFactory;

    protected $primaryKey = 'customer_reward_id';
    protected $fillable = ['customer_id', 'order_id', 'description', 'points', 'date_added'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }
}
