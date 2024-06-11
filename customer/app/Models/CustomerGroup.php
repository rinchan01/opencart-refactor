<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerGroup extends Model
{
    use HasFactory;
    protected $table = 'customer_group';
    protected $primaryKey = 'customer_group_id';
    public $timestamps = false;

    protected $fillable = [
        'approval', 'sort_order'
    ];
}
