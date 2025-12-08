<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
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
     * Scope a query to only include sub category items.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSubCategory($query)
    {
        return $query->where('parent_id', '!=', null);
    }

    /**
     * Scope a query to only include main category items.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeMainCategory($query)
    {
        return $query->where('parent_id', '=', null);
    }

    /**
     * relationships with this same ProductCategory model
     * a Product Category may contain another parent Category
     */
    public function parent()
    {
        return $this->belongsTo(ProductCategory::class, 'parent_id');
    }

    /**
     * relationships with this same ProductCategory model
     * a Product Category may contain another parent Category
     */
    public function activeParent()
    {
        return $this->belongsTo(ProductCategory::class, 'parent_id')->active();
    }

    /**
     * relationships with this same ProductCategory model
     * a Product Category may have many child Categories
     */
    public function children()
    {
        return $this->hasMany(ProductCategory::class, 'parent_id');
    }

    /**
     * relationships with this same ProductCategory model
     * a Product Category may have many child Categories
     */
    public function activeChildren()
    {
        return $this->hasMany(ProductCategory::class, 'parent_id')->active();
    }

    /**
     * relationships with Product model
     * a Product Category may have several products
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * relationships with Product model
     * a Product Category may have several products
     */
    public function activeProducts()
    {
        return $this->hasMany(Product::class)->active();
    }
}
