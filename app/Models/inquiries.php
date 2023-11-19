<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inquiries extends Model
{
    protected $fillable = [
        'fullname',
        'from',
        'to',
        'programEmail',
        'date',
        'email',
        'contacts',
        'message',
        'attachment'
    ];
    use HasFactory;
}
