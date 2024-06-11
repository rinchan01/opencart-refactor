<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'country';
    protected $primaryKey = 'country_id';
    public $timestamps = false;

    protected $fillable = [
        'name', 'iso_code_2', 'iso_code_3', 'postcode_required', 'status'
    ];
    public function zones()
    {
        return $this->hasMany(Zone::class, 'country_id');
    }
}
