<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // 1. تأكد من هذا السطر
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{  
    use HasFactory, Notifiable; // 2. تأكد من إضافة HasFactory هنا

    protected $table = 'users'; // ← هاد السطر لازم يكون
    
    protected $fillable = [
        'username', 'email', 'password',
    ];

    public $timestamps = false;
}