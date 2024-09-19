<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class requestOffers extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];


    /**
     * Get the user that owns the requestOffers
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function NewRequests()
    {
        return $this->belongsTo(NewRequest::class, 'nr_id');
    }
}
