<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracker extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $attributes = ['hits' => 0];

    public static function boot() {
        // When a new instance of this model is created...
        parent::boot();
        static::creating(function ($tracker) {
            $tracker->hits = 0;
        } );

        // Any time the instance is saved (create OR update)
        static::saving(function ($tracker) {
            $tracker->visit_date = date('Y-m-d');
            $tracker->visit_time = date('H:i:s');
            $tracker->hits++;
        } );
    }

// Fill in the IP and today's date
    public function scopeCurrent($query) {
        return $query->where('ip', $_SERVER['REMOTE_ADDR'])
            ->where('visit_date', date('Y-m-d'));
    }

    public static function hit() {
        static::firstOrCreate([
            'ip'   => $_SERVER['REMOTE_ADDR'],
            'visit_date' => date('Y-m-d'),

        ])->save();

    }
}
