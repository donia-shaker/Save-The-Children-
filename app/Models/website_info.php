<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class website_info extends Model
{
    use HasFactory, HasTranslations;
    
    protected $guarded = [];

    public $translatable = ['table_key','table_value'];
}
