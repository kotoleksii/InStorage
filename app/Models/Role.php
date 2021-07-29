<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static get()
 */
class Role extends Model
{
    use HasFactory;

    const DEFAULT_ADMIN_ROLE_SLUG = 'admin';

    protected $fillable =[
        'title', 'slug'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Role belongs to many Permissions
     *
     * @return BelongsToMany
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'permission_role');
    }
}
