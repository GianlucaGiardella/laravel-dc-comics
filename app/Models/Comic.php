<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comic extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'artists' => 'array',
        'writers' => 'array',
    ];

    protected $fillable = ['title', 'thumb', 'price', 'series', 'sale_date', 'type', 'artists', 'writers'];
}