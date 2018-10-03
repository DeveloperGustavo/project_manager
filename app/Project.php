<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'cost',
        'final_date'
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
