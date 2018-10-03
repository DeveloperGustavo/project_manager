<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'difficult',
        'description',
        'deleted_at',
        'project_id'
    ];

    public function projects(){
        return $this->hasMany(Project::class);
    }
}
