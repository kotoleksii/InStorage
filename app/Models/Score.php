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
class Score extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
      'title', 'description'
    ];

    /**
     * Score has many Materials
     * @return HasMany
     */
    public function materials(): HasMany
    {
        return $this->hasMany(Material::class);
    }
}
