<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allDashboard = Permission::create(
            [
                'name' => 'all_dashboard',
                'display_name'  => 'ادارة لوحة التحكم كاملة',
                'description'   => 'Manage All The Dashboard'
            ]
        );
        $location = Permission::create(
            [
                'name' => 'manage_location',
                'display_name'  => 'ادارة نقاط الخدمة',
                'description'   => 'Manage Services Point'
            ]
        );
        $services = Permission::create(
            [
                'name' => 'manage_services',
                'display_name'  => 'ادارة خدمات الموقع',
                'description'   => 'Manage All Services'
            ]
        );
        $content = Permission::create(
            [
                'name' => 'manage_content',
                'display_name'  => 'ادارة محتوى الموقع',
                'description'   => 'Manage Pages Content'
            ]
        );
    }
}
