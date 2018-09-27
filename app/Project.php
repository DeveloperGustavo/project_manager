<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'cost',
        'owner',
        'final_date',
        'description'
    ];

    public function projects(){
        return $this->belongsToMany(User::class);
    }
}
