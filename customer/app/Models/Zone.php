<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;
    protected $table = 'zone';
    protected $primaryKey = 'zone_id';
    public $timestamps = false;

    protected $fillable = [
        'country_id', 'name', 'code', 'status'
    ];
    public function addresses()
    {
        return $this->hasMany(Address::class, 'zone_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
