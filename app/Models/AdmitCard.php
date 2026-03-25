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
            dd($card);
            if(!$card->slug){
                $card->slug = Str::slug($card->title . '-2026');
            }
        });
    }
}
