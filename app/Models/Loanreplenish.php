<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loanreplenish extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'replenish_amount',
        'user_id',
        'loan_id',
        'created_at',
        'updated_at',
    ];

    public function loans()
    {
        return $this->belongsTo(Loan::class, 'loan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function program()
    {
        return $this->user->belongsTo(Program::class, 'program_id');
    }

    public function loanstatus() {
        return $this->loans->belongsTo(Loanstatus::class, 'loanstatus_id');
    }

    public function currentloanstatus() {
        return $this->loans->belongsTo(Currentloanstatus::class, 'currentloanstatus_id');
    }
}
