<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hero extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'title',
        'description',
        'experience_months',
        'tech_stack',
        'profile_image',
    ];

    protected $dates = ['deleted_at'];
}