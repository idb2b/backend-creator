<?php

namespace App\Models;

use App\Models\Post\Post;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string<int, string>
     */
    protected $fillable = [
        "first_name",
        "last_name",
        "email",
        "username",
        "password",
        "public",
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        "password",
        "remember_token",
        "two_factor_recovery_codes",
        "two_factor_secret",
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        "email_verified_at" => "datetime",
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = ["profile_photo_url"];

    /**
     * Generate a unique reference ID for the model.
     *
     * The function is being called automatically by Laravel's
     * Eloquent ORM when a new Team model instance is being created.
     *
     *
     * The creating event is fired when a new instance of
     * the model is being created and saved to the database.
     * This event is fired just before the model is actually
     * saved, which means that you can use it to modify
     * any attributes on the model before it's saved.
     * In this case, the boot method in the model is used
     * to register the creating event listener, which generates
     * a unique reference ID for the new team instance.
     *
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            do {
                // generate a random string
                $randomString = Str::random(rand(8, 14));
                // convert the random string to lowercase using strtolower
                $user->reference_id = strtolower($randomString);
            } while (
                static::where("reference_id", $user->reference_id)->exists()
            );
        });
    }
}
