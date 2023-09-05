<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = []; //protected $guarded = []; makes every field be fillable
//     protected $fillable = [
//     'first_name',
//     'middle_name',
//     'last_name',
//     'email',
//     'email_verified_at',
//     'password',
//     'photo',
//     'phone',
//     'primary_address',
//     'city',
//     'province',
//     'zip',
//     'role',
//     'status',
//     'remember_token',
//     'created_at',
//     'updated_at',
// ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->generateWorkEmail();
        });

        static::updating(function ($user) {
            $user->generateWorkEmail();
        });

        static::creating(function ($user) {
            $user->generateDefaultPassword();
        });

        static::updating(function ($user) {
            $user->generateDefaultPassword();
        });
    }

    public function generateWorkEmail()
    {
        // $workEmail = strtolower($this->first_name  . $this->middle_name . '.' . $this->last_name . '@apaoalbay.gov.ph');
        $workEmail = strtolower(str_replace(' ', '', $this->first_name . $this->middle_name . '.' . $this->last_name) . '@apaoalbay.gov.ph');
        $this->attributes['email'] = $workEmail;
    }

    public function generateDefaultPassword()
    {
        $defaultPassword = Hash::make('ApaoAlbay2023');
        $this->attributes['password'] = $defaultPassword;
    }

}
