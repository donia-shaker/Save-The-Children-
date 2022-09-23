<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\website_info;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = Role::create(
            [
                'name' => 'super_admin',
                'display_name'  => 'Super Admin',
                'description'   => 'Manage All The Dashboard'
            ]
        );
        
        $admin =Role::create(
            [
                'name'          => 'admin',
                'display_name'  => 'Admin',
                'description'   => 'Manage Dashboard'
            ]
        );
        
        
    }
}
