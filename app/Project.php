<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'cost',
        'final',
        'user_id'
    ];

    public function projects(){
        return $this->belongsToMany(User::class);
    }
}
