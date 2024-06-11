<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';
    protected $primaryKey = 'customer_id';
    public $timestamps = false;

    protected $fillable = [
        'store_id', 'customer_group_id', 'language_id', 'firstname', 'lastname', 'email', 'telephone', 'customer_field', 'password', 'status', 'ip', 'newsletter', 'safe', 'commenter', 'token', 'code', 'date_added'
    ];

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function customerGroup()
    {
        return $this->belongsTo(CustomerGroup::class, 'customer_group_id');
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }
}
