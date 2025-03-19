<?php

namespace Database\Seeders;

use App\Models\Department;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        //Department::factory(10)->create();
        //User::factory(10)->create();
        //Department::factory(10)->create();
        
       Department::factory()->create([
            'id' => 1,
            'name' => 'DEV',
        ]); 

        Department::factory()->create([
            'id' => 2,
            'name' => 'HR',
        ]); 
 
        User::factory()->create([
            'name' => 'admin',
            'email' => 'a@a.com',
            'department_id' => 1,
            'role' => 'admin' ,
            'password' => Hash::make('123456'),
        ]);

        User::factory()->create([
            'name' => 'employee',
            'email' => 'b@b.com',
            'department_id' => 2,
            'password' => Hash::make('123456'),
        ]);

    }
}
