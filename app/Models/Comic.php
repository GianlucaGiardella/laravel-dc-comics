<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $casts = [
        'artists' => 'array',
        'writers' => 'array',
    ];

    protected $fillable = ['title', 'thumb', 'price', 'series', 'sale_date', 'type', 'artists', 'writers'];

    use HasFactory;
}