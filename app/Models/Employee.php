<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $check)
 * @method exists()
 * @method static count()
 */
class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'first_name', 'last_name', 'post', 'description',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
