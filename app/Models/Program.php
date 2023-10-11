<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'id',
        'project_coordinator_id',
        'program_name',
        'location',
        'email',
        'contact',
        'description',
        'quiry',
        'requirements',
        'image',
        'table_name',
        'number_columns',
        'remember_token',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'program_id');
    }

}
