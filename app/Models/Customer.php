<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable=[
        'name', 'age', 'addres','status', 'cover_image_path', 'phone', 'user_id', 'gender', 'email'
    ];

    use HasFactory;

}
