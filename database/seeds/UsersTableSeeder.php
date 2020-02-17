<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'realname' => '管理员',
                'sex' => 0,
                'phone' => '13900000000',
                'email' => 'demo@demo.com',
                'password' => '$2y$10$p9lCFijyZEevRb6MvZmrFuWfSbEGrE.ldWu.GO1roqCLCfdRaxAg2',
                'remember_token' => 'Ig4f3SavSRK1w1pLy34Ucnaw7FiKSKQ38mvnJvoBRMWuZ6F3S4YQZAh1kpxt',
                'check' => 1,
                'role_id' => 1,
                'created_at' => '2018-11-27 07:12:54',
                'updated_at' => '2018-12-07 17:46:14',
            ),
        ));
        
        
    }
}