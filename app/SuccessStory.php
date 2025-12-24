<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuccessStory extends Model
{
    use SoftDeletes;

    /**
     * Scope a query to only include active items.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected $table = 'success_story';
    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }
}