<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Scout\Searchable;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'image',
        'first_name',
        'last_name',
        'password',
        'email',
        'country_id',
        'gender',

    ];

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


    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }


    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public static function boot()
    {
        parent::boot();

        // We set the deleted_by attribute before deleted event so we doesn't get an error if Customer was deleted by force (without soft delete).
        static::deleting(function ($user) {
            $user->status = '0';
            $user->save();
        });
    }


    public function hasRole($role)
    {
        if ($this->roles()->where('role_name', $role)->first()) {
            return true;
        }
        return false;
    }

    public function freelancers()
    {
        return $this->hasOne(Freelancer::class);
    }

    public function gigPurchase()
    {
        return $this->hasMany(GigPurchase::class);
    }

    public function gigPaymentTransaction()
    {
        return $this->belongsTo(GigPaymentTransaction::class);
    }

    public function expertises()
    {
        return $this->belongsToMany(Expertise::class, 'user_expertises');
    }

    public function skills()
    {
        return $this->belongsToMany(SkillTag::class, 'skill_user_tags',);
    }

    public function toSearchableArray()
    {
        return [
            'first_name' => $this->title,
            'last_name' => $this->title,
            'email' => $this->title,


        ];
    }
}
