<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
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
        return $query->where('status', '=', 'Active');
    }

    /**
     * Scope a query to only include featured products.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', '=', 1);
    }

    /**
     * Scope a query to include only latest products.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLatestProducts($query)
    {
        return $query->where('is_latest', '=', 1);
    }

    /**
     * relationships with this Product Category model
     * a Product has a product category
     */
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    /**
     * Get the brand of the product
     */
    public function brand()
    {
        return $this->belongsTo(ProductBrand::class, 'product_brand_id');
    }

    /**
     * relationships with this same Product model
     * a Product may contain several other related products
     */
    public function related()
    {
        return $this->belongsToMany(Product::class, 'related_products', 'product_id', 'related_id');
    }

    /**
     * relationships with this same Product model
     * a Product may contain several other related products
     */
    public function activeRelated()
    {
        return $this->belongsToMany(Product::class, 'related_products', 'product_id', 'related_id')->active();
    }

    /**
     * Get the galleries for the product.
     */
    public function galleries()
    {
        return $this->hasMany(ProductGallery::class);
    }

    /**
     * Get the active galleries for the product.
     */
    public function activeGalleries()
    {
        return $this->hasMany(ProductGallery::class)->active();
    }

    /**
     * Get the images for the product.
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * Get the active images for the product.
     */
    public function activeImages()
    {
        return $this->hasMany(ProductImage::class)->active();
    }

    /**
     * Get the active first image of the product.
     */
    public function activeFirstImage()
    {
        return $this->hasOne(ProductImage::class)->active();
    }

    /**
     * Get the features of the product.
     */
    public function features()
    {
        return $this->hasMany(ProductFeature::class);
    }

    /**
     * Get the active features of the product.
     */
    public function activeFeatures()
    {
        return $this->hasMany(ProductFeature::class)->active();
    }
}
