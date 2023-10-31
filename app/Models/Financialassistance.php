<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financialassistance extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'amount',
        'financial_assistance_status_id',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function financial_assistance_status()
    {
        return $this->belongsTo(Financialassistancestatus::class);
    }
}
