<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function challengecategory(){
        return $this->belongsTo(ChallengeCategory::class, 'challenge_category_id');
    }

    
    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
