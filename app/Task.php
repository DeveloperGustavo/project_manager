<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'difficult',
        'description',
        'deleted_at'
    ];
}
