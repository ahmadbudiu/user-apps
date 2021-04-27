<?php

namespace Database\Seeders;

use App\Models\UserPermission;
use App\Models\UserRole;
use App\Traits\JsonSeeder;
use Illuminate\Database\Seeder;
use Laravel\Jetstream\Jetstream;

class RolesTableSeeder extends Seeder
{
    use JsonSeeder;

    public function __construct()
    {
        $this->path = 'jsons/seeders/roles.json';
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->runSeeder();
    }

    public function seed()
    {
        foreach ($this->jsonData as $row) {
            /** @var UserRole $role */
            $role = UserRole::create([
                'name' => $row->name,
            ]);
            $permissions = (isset($row->permissions)) ? $row->permissions : [];
            foreach ($permissions as $permissionName) {
                $permission = UserPermission::where('name', $permissionName)->first();
                if (empty ($permission)) {
                    $permission = UserPermission::create([
                        'name' => $permissionName,
                    ]);
                }
                $role->permissions()->attach($permission);
            }
        }
    }
}
