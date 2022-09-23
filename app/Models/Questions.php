<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Questions extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded = [];

    public $translatable = ['description','page_content'];

    public function service(){
        return $this->belongsTo(Services::class,'service_id');
    }
}
