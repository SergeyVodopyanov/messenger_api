<?php

namespace App\Services;

use App\Models\Role;
use Illuminate\Support\Str;

class RoleService
{
    public function index()
    {
        $roles = Role::all();

        return $roles;
    }

    public function show(string $id)
    {
        $role = Role::findOrFail($id);

        return $role;
    }

    public function store(array $data)
    {
        $role = Role::create($data);

        return $role;
    }

    public function update(string $id, array $data)
    {
        $role = Role::findOrFail($id);

        $role->update($data);

        return $role->fresh();
    }

    public function destroy(string $id)
    {
        $deleted = Role::findOrFail($id)->delete();

        return $deleted;
    }
}
