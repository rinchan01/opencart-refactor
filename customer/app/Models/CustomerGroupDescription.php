<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerGroupDescription extends Model
{
    use HasFactory;

    protected $primaryKey = 'customer_group_id';
    protected $fillable = ['language_id', 'name', 'description'];
}
