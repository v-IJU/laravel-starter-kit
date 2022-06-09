<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        User::insert([
            ['name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('password')],

            ['name'=>'Principal',
            'email'=>'prin@gmail.com',
            'password'=>bcrypt('password')],
            ['name'=>'Hod',
            'email'=>'hod@gmail.com',
            'password'=>bcrypt('password')],

        ]);


        Role::insert([
            ['name'=>'Admin','slug'=>'admin'],
            ['name'=>'Principal','slug'=>'principal'],
            ['name'=>'Hod','slug'=>'hod'],
            ['name'=>'Student','slug'=>'student'],

        ]);

        Permission::insert([
            ['name'=>'Edit Post','slug'=>'edit.post','group'=>'Post'],
            ['name'=>'Add Post','slug'=>'add.post','group'=>'Post'],
            ['name'=>'Delete Post','slug'=>'delete.post','group'=>'Post'],
        ]);
    }
}
