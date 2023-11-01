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
        'id',
        'profile_image',
        'full_name',
        'user_name',
        'gamer_id',
        'email',
        'password',
        'gender',
        'experience_points',
        'health_bar',
        'mena_bar',
        'level',
        'body_shape',
        'Age',
        'position',
        'company_name',
        'active'
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

    public function activity_user()
    {
        return $this->belongsToMany(Activity::class, 'activity_user');
    }

    public function assignInterest($interest)
    {
        return $this->interests()->save($interest);
    }

    public function interests()
    {
        return $this->belongsToMany(Interest::class,'interest_user');
    }

    public function unSeenMessages(){
        return $this->hasMany(Message::class, 'sender_id')->where('seen', 0)->where('receiver_id', auth()->user()->id)->get();
    }
 
    public function lastMessage(){
        return $this->hasMany(Message::class, 'sender_id')->where('receiver_id', auth()->user()->id)->latest()->first();
    }

    public function challenges(){
        return $this->belongsToMany(Challenge::class)->withTimestamps();
    }

    public function unseenMessageNotification(){
        return $this->hasMany(Message::class, 'receiver_id')->where('seen', 0)->count();
    }

}
