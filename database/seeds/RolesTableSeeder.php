<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Super-Admin',
                'display_name' => '超级管理员',
                'guard_name' => 'web',
                'created_at' => '2018-11-29 04:48:56',
                'updated_at' => '2018-11-29 04:48:56',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Audit',
                'display_name' => '审计员',
                'guard_name' => 'web',
                'created_at' => '2018-12-07 02:44:03',
                'updated_at' => '2018-12-07 12:10:43',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'Operator',
                'display_name' => '操作员',
                'guard_name' => 'web',
                'created_at' => '2018-12-07 12:11:00',
                'updated_at' => '2018-12-07 12:11:00',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'Admin',
                'display_name' => '管理员',
                'guard_name' => 'web',
                'created_at' => '2018-12-07 12:11:16',
                'updated_at' => '2018-12-07 12:11:16',
            ),
        ));
        
        
    }
}