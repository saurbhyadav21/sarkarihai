<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmitCard extends Model
{
    use HasFactory;    
    protected $table = 'admit_card'; // your table name
    protected $guarded = [];   // allow mass assignment for all fields
}
