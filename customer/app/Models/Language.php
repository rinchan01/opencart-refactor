<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $table = 'language';
    protected $primaryKey = 'language_id';
    public $timestamps = false;

    protected $fillable = [
        'name', 'code', 'extension', 'status', 'sort_order'
    ];
}
