<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mineducation extends Model
{
    use HasFactory;

    protected $table = 'min_education'; // your table name
    protected $guarded = [];   // allow mass assignment for all fields
}
