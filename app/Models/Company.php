<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Company extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable  ;

//    protected $table = 'companies';
    protected $guarded = [];
    // public $translatable = ['name'];

//    protected $fillable = [
//        'name',
//        'email',
//        'password',
//        'role',
//        'logo',
//        'phone',
//        'about',
//        'ct_id',
//        'status',
//        'rate'
//    ];

//    protected $hidden = [
//        'password',
//        'remember_token',
//    ];

   public function company_type()
   {
       return $this->belongsTo(companies_type::class,'ct_id');
   }

      public function company_service(): HasMany
  {
      return $this->hasMany(companies_service::class,'company_id')->with(['categories']);
  }




}
