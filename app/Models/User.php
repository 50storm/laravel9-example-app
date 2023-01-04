<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'last_name',
        'first_name',
        'email',
        'post_code',
        'address_prefecture',
        'address_city',
        'address_street_address',
        'address_building_number',
        'phone_number',
        'password',
    ];

    // $table->string('email')->unique();
    // $table->string('post_code', 7)->nullable();
    // $table->string('address_prefecture')->nullable();
    // $table->string('address_city')->nullable();
    // $table->string('address_street_address')->nullable();
    // $table->string('address_building_number')->nullable();
    // $table->string('phone_number', 13);
    // $table->timestamp('email_verified_at')->nullable();
    // $table->string('password');

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
    ];
}
