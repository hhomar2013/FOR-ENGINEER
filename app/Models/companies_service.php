<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class companies_service extends Model
{
    use HasFactory;
    protected $guarded=[];



    public function categories(): BelongsTo
    {
        return $this->belongsTo(categories::class,'category_id');
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class,'company_id');
    }


    public function site_price(): HasMany
    {
       return $this->hasMany(service_site_price::class,'category_id');
    }





}
