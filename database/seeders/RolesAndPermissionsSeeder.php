<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissionsByRole = [
            'admin' => ['restore posts', 'force delete posts'],
            'postulant' => ['create a post', 'update a post', 'delete a post'], 
        ];
        
        $insertPermissions = fn ($role) => collect($permissionsByRole[$role])
            ->map(fn ($name) => \DB::table('permissions')->insertGetId(['name' => $name, 'guard_name' => 'web']))
            ->toArray();
        
        $role = Role::create(['name' => 'admin']);
        $role = Role::create(['name' => 'postulant']);

        $permissionIdsByRole = [
            'admin' => $insertPermissions('admin'),
            'postulant' => $insertPermissions('postulant'), 
        ];
        
        foreach ($permissionIdsByRole as $role => $permissionIds) {
            $role = Role::whereName($role)->first();
        
            \DB::table('role_has_permissions')
                ->insert(
                    collect($permissionIds)->map(fn ($id) => [
                        'role_id' => $role->id,
                        'permission_id' => $id
                    ])->toArray()
                );
        }
        
    }
}