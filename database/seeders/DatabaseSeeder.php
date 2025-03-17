<?php

namespace Database\Seeders;

use App\Models\Department;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

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
            'department_name' => 'DEV',
        ]); 
 
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'a@a.com',
            'department_id' => 1,
        ]);
    }
}
