<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'password',
        'phone_number',
        'codeLogin',
        'isClient',
        'isClient',
        'isMechanic',
        'address',
        'city'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
