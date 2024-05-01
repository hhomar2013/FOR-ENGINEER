<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class service_site_price extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];


    public function categories(): BelongsTo
    {
        return $this->belongsTo(categories::class,'category_id');
    }
}
