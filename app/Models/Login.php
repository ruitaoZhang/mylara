<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    public $table = 'logins';
    public $fillable = ['user_id', 'ip_address'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
