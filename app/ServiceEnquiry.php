<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceEnquiry extends Model
{
    use SoftDeletes;

    /**
     * Get the service
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
