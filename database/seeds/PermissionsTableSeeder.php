<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'system.manage',
                'display_name' => '系统管理',
                'route' => NULL,
                'icon_id' => 100,
                'guard_name' => 'web',
                'parent_id' => 0,
                'sort' => NULL,
                'created_at' => '2018-11-29 04:49:48',
                'updated_at' => '2018-11-29 04:49:48',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'system.user',
                'display_name' => '用户管理',
                'route' => 'admin.user',
                'icon_id' => 123,
                'guard_name' => 'web',
                'parent_id' => 1,
                'sort' => NULL,
                'created_at' => '2018-12-05 11:51:54',
                'updated_at' => '2018-12-05 11:52:30',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'system.user.create',
                'display_name' => '添加用户',
                'route' => 'admin.user.create',
                'icon_id' => 1,
                'guard_name' => 'web',
                'parent_id' => 2,
                'sort' => NULL,
                'created_at' => '2018-12-05 11:51:57',
                'updated_at' => '2018-12-05 11:52:32',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'system.user.edit',
                'display_name' => '编辑用户',
                'route' => 'admin.user.edit',
                'icon_id' => 1,
                'guard_name' => 'web',
                'parent_id' => 2,
                'sort' => NULL,
                'created_at' => '2018-12-05 11:51:59',
                'updated_at' => '2018-12-05 11:52:35',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'system.user.destroy',
                'display_name' => '删除用户',
                'route' => 'admin.user.destroy',
                'icon_id' => 1,
                'guard_name' => 'web',
                'parent_id' => 2,
                'sort' => NULL,
                'created_at' => '2018-12-05 11:52:01',
                'updated_at' => '2018-12-05 11:52:37',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'system.user.role',
                'display_name' => '分配角色',
                'route' => 'admin.user.role',
                'icon_id' => 1,
                'guard_name' => 'web',
                'parent_id' => 2,
                'sort' => NULL,
                'created_at' => '2018-12-05 11:52:04',
                'updated_at' => '2018-12-05 11:52:40',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'system.user.permission',
                'display_name' => '分配权限',
                'route' => 'admin.user.permission',
                'icon_id' => 1,
                'guard_name' => 'web',
                'parent_id' => 2,
                'sort' => NULL,
                'created_at' => '2018-12-05 11:52:06',
                'updated_at' => '2018-12-05 11:52:42',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'system.role',
                'display_name' => '角色管理',
                'route' => 'admin.role',
                'icon_id' => 121,
                'guard_name' => 'web',
                'parent_id' => 1,
                'sort' => NULL,
                'created_at' => '2018-12-05 11:52:09',
                'updated_at' => '2018-12-05 11:52:45',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'system.role.create',
                'display_name' => '添加角色',
                'route' => 'admin.role.create',
                'icon_id' => 1,
                'guard_name' => 'web',
                'parent_id' => 8,
                'sort' => NULL,
                'created_at' => '2018-12-05 11:52:11',
                'updated_at' => '2018-12-05 11:52:47',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'system.role.edit',
                'display_name' => '编辑角色',
                'route' => 'admin.role.edit',
                'icon_id' => 1,
                'guard_name' => 'web',
                'parent_id' => 8,
                'sort' => NULL,
                'created_at' => '2018-12-05 11:52:13',
                'updated_at' => '2018-12-05 11:52:50',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'system.role.destroy',
                'display_name' => '删除角色',
                'route' => 'admin.role.destroy',
                'icon_id' => 1,
                'guard_name' => 'web',
                'parent_id' => 8,
                'sort' => NULL,
                'created_at' => '2018-12-05 11:52:15',
                'updated_at' => '2018-12-05 11:52:53',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'system.role.permission',
                'display_name' => '分配权限',
                'route' => 'admin.role.permission',
                'icon_id' => 1,
                'guard_name' => 'web',
                'parent_id' => 8,
                'sort' => NULL,
                'created_at' => '2018-12-05 11:52:18',
                'updated_at' => '2018-12-05 11:52:55',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'system.permission',
                'display_name' => '权限管理',
                'route' => 'admin.permission',
                'icon_id' => 12,
                'guard_name' => 'web',
                'parent_id' => 1,
                'sort' => NULL,
                'created_at' => '2018-12-05 11:52:22',
                'updated_at' => '2018-12-05 11:52:58',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'system.permission.create',
                'display_name' => '添加权限',
                'route' => 'admin.permission.create',
                'icon_id' => 1,
                'guard_name' => 'web',
                'parent_id' => 13,
                'sort' => NULL,
                'created_at' => '2018-12-05 11:52:20',
                'updated_at' => '2018-12-05 11:53:01',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'system.permission.edit',
                'display_name' => '编辑权限',
                'route' => 'admin.permission.edit',
                'icon_id' => 1,
                'guard_name' => 'web',
                'parent_id' => 13,
                'sort' => NULL,
                'created_at' => '2018-12-05 11:52:25',
                'updated_at' => '2018-12-05 11:53:04',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'system.permission.destroy',
                'display_name' => '删除权限',
                'route' => 'admin.permission.destroy',
                'icon_id' => 1,
                'guard_name' => 'web',
                'parent_id' => 13,
                'sort' => NULL,
                'created_at' => '2018-12-05 11:52:27',
                'updated_at' => '2018-12-05 11:53:06',
            ),
            16 => 
            array (
                'id' => 18,
                'name' => 'res.manage',
                'display_name' => '资源管理',
                'route' => NULL,
                'icon_id' => 25,
                'guard_name' => 'web',
                'parent_id' => 0,
                'sort' => NULL,
                'created_at' => '2018-12-07 11:48:40',
                'updated_at' => '2018-12-07 11:48:40',
            ),
        ));
        
        
    }
}