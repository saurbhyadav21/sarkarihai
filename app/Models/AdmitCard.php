<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class AdmitCard extends Model
{
    use HasFactory;    
    protected $table = 'admit_card'; // your table name
    protected $guarded = [];   // allow mass assignment for all fields

    // protected $fillable = ['title', 'exam_dates', 'slug'];

    protected static function booted()
    {
        static::creating(function ($card) {
            if(!$card->slug){
                if($card->title){ 
                    $card->slug = Str::slug($card->title . '-2026');
                } else {
                    $card->slug = 'admit-card-2026'; // fallback
                }
            }
        });
    }
}
