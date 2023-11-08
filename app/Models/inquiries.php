<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inquiries extends Model
{
    protected $fillable = [
        'fullname',
        'to',
        'email',
        'message',
        'attachment'
    ];
    use HasFactory;
}
