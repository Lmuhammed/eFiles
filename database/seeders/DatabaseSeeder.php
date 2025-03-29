<?php

namespace Database\Seeders;

use App\Models\Correspondence;
use App\Models\Department;
use App\Models\File;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
    
      /*
        Department::factory()->create([
            'id' => 1,
            'name' => 'DEV',
        ]); 
        Department::factory()->create([
            'id' => 2,
            'name' => 'HR',
        ]); 
        User::factory()->create([
            'name' => 'Khalid El Khaldi',
            'email' => 'Khalid1',
             'role' => 'admin' ,
            'department_id' => 1,
            'password' => Hash::make('123456'),
        ]);   
        User::factory()->create([
            'name' => 'Ahmed El ahmadi',
            'email' => 'ahmedA',
             'role' => 'manager' ,
            'department_id' => 2,
            'password' => Hash::make('123456'),
        ]);   
 
        Correspondence::factory(10)->create();
        Department::factory(10)->create();
        User::factory(10)->create();
        File::factory(10)->create();
        
        */
        

    }
}
