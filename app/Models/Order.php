<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded=[];

public function companies_service(): BelongsTo
{
    return $this->belongsTo(companies_service::class,'company_service');
}

public function users(): BelongsTo
{
    return $this->belongsTo(User::class,'user');
}


public function orderComments(): HasMany
{
    return $this->hasMany(OrderComments::class,'order_ref','id');
}


}
