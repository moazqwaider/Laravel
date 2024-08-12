<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CardAbout extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $guarded = [];
    public $translatable = ['card_title', 'card_description'];


    public function aboutUs(){
        return $this->belongsTo(About_us::class,'aboutId','id');
    }
}
