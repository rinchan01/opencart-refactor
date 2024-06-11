<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerApproval extends Model
{
    use HasFactory;

    protected $table = 'customer_approval';
    protected $primaryKey = 'customer_approval_id';
    public $timestamps = false;

    protected $fillable = [
        'customer_id', 'type', 'date_added'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
