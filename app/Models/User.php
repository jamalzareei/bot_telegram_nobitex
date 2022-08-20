<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'chat_id',
        'email',
        'phone',
        'email_verified_at',
        'phone_verified_at',
        'password',
        'birth_date',
        'balance',
        'code_confirm',
        'document_id',
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

    protected $appends = [
        'birth_date_fa',
    ];

    
    public function getBirthDateFaAttribute() {
        return $this->birth_date ? verta($this->birth_date)->format('%d %B، %Y') : '';
    }

    /**
     * Get all of the accounts for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    /**
     * The roles that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles_telegram()
    {
        return $this->belongsToMany(Role::class, 'model_has_roles', 'model_id', 'role_id')->where('type', 'telegram')->latest('role_id')->take(1);
    }
}
