<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use App\Models\RolePermission;
use Illuminate\Database\Seeder;

class Permissionseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin permission siteuser

        $siteuserpermission=[
           
           [
            'name'=>'Siteuser index',
            'slug'=>'siteuser.index',
            'group'=>'Siteuser'
           ],
           [
            'name'=>'Siteuser Edit',
            'slug'=>'siteuser.edit',
            'group'=>'Siteuser'
           ],
           [
            'name'=>'Siteuser list',
            'slug'=>'getsiteuser_data',
            'group'=>'Siteuser'
           ],
           [
            'name'=>'Siteuser status',
            'slug'=>'statuschange.siteuser',
            'group'=>'Siteuser'
           ],
           [
            'name'=>'Siteuser delete',
            'slug'=>'destroy.siteuser',
            'group'=>'Siteuser'
           ],
           [
            'name'=>'Siteuser create',
            'slug'=>'siteuser.create',
            'group'=>'Siteuser'
           ]
            
        ];

        $userpermission=[
            [
                'name'=>'User index',
                'slug'=>'user.index',
                'group'=>'User'
            ],
            [
                'name'=>'User create',
                'slug'=>'user.create',
                'group'=>'User'
            ],
            [
                'name'=>'User list',
                'slug'=>'user.getuser_data',
                'group'=>'User'
            ],
            [
                'name'=>'User show',
                'slug'=>'user.show',
                'group'=>'User'
            ],
            [
                'name'=>'User update',
                'slug'=>'user.update',
                'group'=>'User'
            ],
            [
                'name'=>'User destroy',
                'slug'=>'user.destroy',
                'group'=>'User'
            ]


        ];

        $rolepermission=[
            [
                'name'=>'Role index',
                'slug'=>'role.index',
                'group'=>'Role'
            ],
            [
                'name'=>'Role create',
                'slug'=>'role.create',
                'group'=>'Role'
            ],
            [
                'name'=>'Role edit',
                'slug'=>'role.edit',
                'group'=>'Role'
            ],
            [
                'name'=>'Role update',
                'slug'=>'role.update',
                'group'=>'Role'
            ],
            [
                'name'=>'Role show',
                'slug'=>'role.show',
                'group'=>'Role'
            ],
            [
                'name'=>'Role destroy',
                'slug'=>'role.destroy',
                'group'=>'Role'
            ],
            [
                'name'=>'Role list',
                'slug'=>'role.getrolluser_data',
                'group'=>'Role'
            ],
        ];

        $permissionsper=[
            [
                'name'=>'Permission index',
                'slug'=>'permission.index',
                'group'=>'Permission'
            ],
            
            [
                'name'=>'Permission list',
                'slug'=>'getpermissionData',
                'group'=>'Permission'
            ],
            [
                'name'=>'Permission edit',
                'slug'=>'permission.edit',
                'group'=>'Permission'
            ],
            [
                'name'=>'Permission update',
                'slug'=>'permission.update',
                'group'=>'Permission'
            ],
            [
                'name'=>'Permission show',
                'slug'=>'permission.show',
                'group'=>'Permission'
            ],
            [
                'name'=>'Permission destroy',
                'slug'=>'permission.destroy',
                'group'=>'Permission'
            ],
            [
                'name'=>'Permission create',
                'slug'=>'permission.create',
                'group'=>'Permission'
            ],
            [
                'name'=>'Permission store',
                'slug'=>'permission.store',
                'group'=>'Permission'
            ],

            $mailconfig=[
                [
                    'name'=>'Mailconfiguration View',
                    'slug'=>'mailconfig.view',
                    'group'=>'Mailconfig'
                ],
                [
                    'name'=>'Mailconfiguration Update',
                    'slug'=>'mailconfig.update',
                    'group'=>'Mailconfig'
                ],
                [
                    'name'=>'Lfm settings',
                    'slug'=>'lfm.view',
                    'group'=>'Lfm'
                ],
            ]
        ];

        $Totalpermission=array_merge( $mailconfig, $permissionsper,$rolepermission, $userpermission, $siteuserpermission);

        Permission::insert($Totalpermission);
        //roles asign permission

        $admin=Role::where('name','Admin')->first();
        $admin_user=User::where('name','Hod')->first();
        $principal=Role::where('name','Principal')->first();
        $hod=Role::where('name','Hod')->first();
        $student=Role::where('name','Student')->first();
        $permission=Permission::get();
        $commonpermission=$permission->whereNotIn('group',['Role','Permission']);
        $admin->permissions()->saveMany($permission);
        $principal->permissions()->saveMany($commonpermission);
        $hod->permissions()->saveMany($commonpermission);
        $admin->users()->attach($admin_user);
        $student->permissions()->saveMany($commonpermission);


        
    }
}
