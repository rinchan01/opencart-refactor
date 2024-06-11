<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerActivity extends Model
{
    use HasFactory;

    protected $table = 'customer_activity';
    protected $primaryKey = 'customer_activity_id';
    public $timestamps = false;

    protected $fillable = [
        'customer_id', 'key', 'data', 'ip', 'date_added'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
