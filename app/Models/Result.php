<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Result extends Model
{
    use HasFactory;    
    protected $table = 'result'; // your table name
    protected $guarded = [];   // allow mass assignment for all fields

    // protected $fillable = ['title', 'exam_dates', 'slug'];


    protected static function booted()
    {
        static::creating(function ($card) {
            
            if(!$card->slug){
                $card->slug = Str::slug($card->job_title . ' 2026-Result out');
            }
        });
    }
}
