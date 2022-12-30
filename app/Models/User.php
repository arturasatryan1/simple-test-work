<?php

namespace App\Models;

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
        'full_name',
        'email'
    ];

    /**
     * @param $data
     */
    public static function createNewUser($data)
    {
        $user = self::create([
            'full_name' => $data['full_name'],
            'email' => $data['email'],
        ]);

        $user->country()->create([
            'country' => $data['country']
        ]);

        $user->phoneBook()->create([
            'phone_number' => $data['phone_number']
        ]);

        return $user;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function country()
    {
        return $this->hasOne(UserCountry::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function phoneBook()
    {
        return $this->hasOne(PhoneBook::class);
    }
}
