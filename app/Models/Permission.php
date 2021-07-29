<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static whereIn(string $string, array $slugs)
 * @method static get()
 */
class Permission extends Model
{
    use HasFactory;

    protected $fillable =[
        'title', 'slug'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'permission_role');
    }
}
