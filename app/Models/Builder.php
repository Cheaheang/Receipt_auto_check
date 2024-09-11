<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Builder extends Model
{
    use HasFactory;
    protected $fillable = [
        'active_id',
        'name',
        'active',
        'date',
        'infrastructure',
        'jobs_id',
        'category',
        'installation_order'
    ];
}
