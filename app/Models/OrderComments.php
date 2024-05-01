<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderComments extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function Orders(): BelongsTo
    {
        return $this->belongsTo(Order::class,'order_ref');
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class,'from_company');
    }

}
