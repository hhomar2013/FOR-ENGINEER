<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class service_provider_reservation extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function companies_types(): BelongsTo
    {
        return $this->belongsTo(companies_type::class,'type_work');
    }
}
