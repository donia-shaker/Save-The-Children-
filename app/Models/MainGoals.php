<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MainGoals extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded = [];

    public $translatable = ['name','description'];

    public function service(){
        return $this->belongsTo(Services::class,'service_id');
    }
}
