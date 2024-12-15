<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tct extends Model
{
    use HasFactory;
    protected $fillable = [
      'tct_cid',
      'tct_sid',
        'new_circuit_id',
        'total_nrc'
    ];
}
