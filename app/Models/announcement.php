<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class announcement extends Model
{
    protected $fillable = [
        'title',
        'to',
        'from',
        'message',
        'status'
    ];
    
    use HasFactory;
}
