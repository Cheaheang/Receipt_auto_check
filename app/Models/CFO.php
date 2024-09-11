<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CFO extends Model
{
    use HasFactory;
    protected $fillable = [
        'work_orders',
        'subscriber_id',
        'port',
        'pos',
        'team_install',
        'create_time'
    ];
}
