<?php

namespace App\Models;

use Cohensive\OEmbed\OEmbed;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function images() {
        return $this->hasMany(ProjectImage::class) ->orderBy('sort');
    }

    public function getVideoAttribute($value){
        $embed = OEmbed::get($value);
        if($embed){
           return $embed->html(['width' => 600]);
        }
    }
}
