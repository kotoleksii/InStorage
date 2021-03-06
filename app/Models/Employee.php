<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create(array $check)
 * @method exists()
 * @method static count()
 * @method static find($id)
 * @method static updateOrCreate(array $array, array $array1)
 * @method static where(string $string, mixed $employee_id)
 * @method static findOrFail(mixed $input)
 * @method static whereBetween(string $string, array $array)
 * @property mixed first_name
 * @property mixed last_name
 * @property mixed post
 * @property mixed description
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
