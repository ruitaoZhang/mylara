<?php

namespace App\Models;

use App\Events\LoginSavedEvent;
use App\Listeners\LoginSaved;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Login extends Model
{
    public $table = 'logins';
    public $fillable = ['user_id', 'ip_address'];

    protected $dispatchesEvents = [
        'saved' => LoginSavedEvent::class
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::creating(function ($login) {
            Log::error('-----in----creating');
        });
        static::created(function ($login) {
            Log::error('-----in----created');
        });
        static::updating(function ($login) {
            Log::error('-----in----updating');
        });
        static::updated(function ($login) {
            Log::error('-----in----updated');
        });
        static::saving(function ($login) {
            Log::error('-----in----saving');
        });
        static::saved(function ($login) {
            Log::error('-----in----saved');
        });
        static::deleting(function ($login) {
            Log::error('-----in----deleting');
        });
        static::deleted(function ($login) {
            Log::error('-----in----deleted');
        });
    }

}