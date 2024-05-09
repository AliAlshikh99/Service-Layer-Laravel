<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasPermissions;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia;
    use HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
        'password' => 'hashed',


    ];
    public function scopeSearch($query, $input)
    {
        return $query
            ->where('name', 'like', "%$input%")
            ->orWhere('email', 'like', "%$input%");
    }
    //    public function registerMediaCollections(): void
    // {
    //     $this->addMediaCollection('images');


    // }
    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('test')

            ->quality(80);
    }

    // public function albums(){
    //     return $this->belongsToMany(album::class);
    // }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
