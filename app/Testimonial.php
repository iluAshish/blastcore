<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
   use SoftDeletes;

    /**
     * Scope a query to only include active items.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected $table = 'testimonials';
    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }
}