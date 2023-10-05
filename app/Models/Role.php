<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'role_name',
        'created_at',
        'updated_at',
    ];
    
    public function user()
    {
        return $this->hasMany(User::class, 'role_id', 'id');
    }
}