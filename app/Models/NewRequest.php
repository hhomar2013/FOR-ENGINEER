<?php

namespace App\Models;

use App\Models\categories as ModelsCategories;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class NewRequest extends Model
{
    use HasFactory,SoftDeletes,Notifiable;

    protected $guarded=[];



    /**
     * Get the user that owns the NewRequest
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categories()
        {
        return $this->belongsTo(ModelsCategories::class, 'category_id');
    }

}
