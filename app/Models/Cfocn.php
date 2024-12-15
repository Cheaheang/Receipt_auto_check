<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cfocn extends Model
{
    protected $fillable = [
        'work_order',
        'port',
        'pos',
        'team_install',
        'create_time'
    ];
    use HasFactory;
}
