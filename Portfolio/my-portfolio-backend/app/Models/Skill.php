<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'subtitle',
        'description',
    ];

    protected $dates = ['deleted_at'];

    // العلاقة مع SkillItem
    public function skillItems()
    {
        return $this->hasMany(SkillItem::class);
    }
}