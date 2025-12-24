<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeGallery extends Model
{
    use SoftDeletes;
    protected $table = 'home_gallery';
    
    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }
}