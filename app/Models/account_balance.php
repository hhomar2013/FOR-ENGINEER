<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class account_balance extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded=[];

  public function orders(): BelongsTo
  {
      return $this->belongsTo(Order::class,'order_id','order_ref');
  }

  public function companies(): BelongsTo
  {
      return $this->belongsTo(Company::class,'company_id');
  }
}
