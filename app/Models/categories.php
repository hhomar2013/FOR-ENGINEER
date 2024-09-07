<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class categories extends Model
{
    use HasFactory,SoftDeletes,HasTranslations;
    protected $guarded=[];
    public $translatable = ['name','info'];

    // One level child
    public function child() {
        return $this->hasMany(Categories::class, 'parent_id');
    }

    // Recursive children
    public function children() {
        return $this->hasMany(Categories::class, 'parent_id')->with('children');
    }

    // One level parent
    public function parent() {
        return $this->belongsTo(Categories::class, 'parent_id');
    }

    // Recursive parents
    public function parents() {
        return $this->belongsTo(Categories::class, 'parent_id')->with('parent');
    }

    public function site_price(): BelongsTo
    {
        return $this->belongsTo(service_site_price::class,'category_id');
    }

}
