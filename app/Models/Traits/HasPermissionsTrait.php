<?php


namespace App\Models\Traits;


use App\Models\Permission;
use Illuminate\Support\Collection;

trait HasPermissionsTrait
{
    /**
     *
     *
     * @param array $slugs
     * @return Collection
     */
    public function getPermissionsBySlug(array $slugs): Collection
    {
        return Permission::whereIn('slug', $slugs)->get();
    }

    public function hasPermission(Permission $permission): bool
    {
        // TODO: переробити
        return (bool)$this->permissions->where('slug', $permission->slug)->count();
    }

    public function hasRole(...$roles): bool
    {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role))
                return true;
        }

        return false;
    }

    public function hasPermissionInRoles($permission): bool
    {
        foreach ($permission->roles as $role) {
            if ($this->roles->contains($role))
                return true;
        }

        return false;
    }

    public function hasPermissionComplete(Permission $permission): bool
    {
        return $this->hasPermission($permission) || $this->hasPermissionInRoles($permission);
    }
}
