<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User1 extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = 
    [
       'username',
       'password',
       'name',
       'email',
       'phone',
    ];
}
