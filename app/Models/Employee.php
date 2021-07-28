<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    /**
     * Employee has many Materials
     *
     * @return HasMany
     */
    public function materials(): HasMany
    {
        return $this->hasMany(Material::class);
    }
}
