<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class requestOffers extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];


    public function requestInfo()
    {
        return $this->belongsTo(NewRequest::class, 'nr_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
