<?php

namespace Database\Seeders;

use App\Models\UserRoles as ModelsUserRoles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        ModelsUserRoles::insert([
            ['role' => 'Simple'],
            ['role' => 'Admin'],
        ]);
    }
}
