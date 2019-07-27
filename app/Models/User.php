<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $table = "users";
    public $fillable = ['name', 'email'];
    // 懒加载功能
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->withLastLogin();
        });
    }

    public function logins()
    {
        return $this->hasMany(Login::class);
    }


    public function scopeWithLastLoginDate($query)
    {
        $query->addSubSelect('last_login_at', Login::select('created_at')
            ->whereColumn('user_id', 'users.id')
            ->latest()
        );
    }

    public function scopeWithLastLoginIpAddress($query)
    {
        $query->addSubSelect('last_login_ip_address ', Login::select('ip_address')
            ->whereColumn('user_id', 'users.id')
            ->latest('updated_at')
        );
    }

    public function lastLogin()
    {
        return $this->belongsTo(Login::class);
    }

    public function scopeWithLastLogin($query)
    {
        $query->addSubSelect('last_login_id', Login::select('id')
            ->whereColumn('user_id', 'users.id')
            ->latest()
        )->with('lastLogin');
    }
}
