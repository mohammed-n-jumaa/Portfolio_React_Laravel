<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SkillItem extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'skill_id',
        'name',
        'category',
        'image',
        'description',
    ];

    protected $dates = ['deleted_at'];

    // العلاقة مع Skill
    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }
}