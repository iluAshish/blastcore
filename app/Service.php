<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;

    /**
     * Scope a query to only include active items.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }

    /**
     * Scope a query to only include featured services.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', '=', 1);
    }

    /**
     * Get the galleries for the service.
     */
    public function galleries()
    {
        return $this->hasMany(ServiceGallery::class);
    }

    /**
     * Get the galleries for the service.
     */
    public function activeGalleries()
    {
        return $this->hasMany(ServiceGallery::class)->active();
    }
}
