<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financial_Assistance_Status extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'financial_assistance_status_name',
        'description',
        'created_at',
        'updated_at',
    ];

    public function financialAssistances()
    {
        return $this->hasMany(Financial_Assistance::class);
    }
}
