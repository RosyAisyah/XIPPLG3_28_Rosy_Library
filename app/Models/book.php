<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    Use HasFactory;

    protected $fillable = [
        'title',
        'writer',
        'user1_id',
        'category_id',
        'publisher',
        'year',
        'stock'
    ];
}