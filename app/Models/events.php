<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class events extends Model
{
    protected $fillable = [
        'title',
        'date',
        'to',
        'message',
        'image',
    ];

    public function files()
    {
        return $this->belongsToMany(File::class);
    }
}
