<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Address extends Model
{
    use HasFactory;
    protected $table = 'address';
    protected $primaryKey = 'address_id';
    public $timestamps = false;

    protected $fillable = [
        'customer_id', 'firstname', 'lastname', 'company', 'address_1', 'address_2', 'city', 'postcode', 'country_id', 'zone_id', 'custom_field'
    ];
    public function store()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function zone()
    {
        return $this->belongsTo(Zone::class, 'zone_id');
    }
}
