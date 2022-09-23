<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

$this->call(WebSiteInfoSeeder::class);
$this->call(roleSeeder::class);
$this->call(PermissionSeeder::class);
$this->call(userTableSeeder::class);
$this->call(ServicesSeeder::class);
$this->call(MainGoalsSeeder::class);
$this->call(ServicesGoalSeeder::class);
$this->call(ServicesFinancingSeeder::class);
$this->call(VolunteeredSeeder::class);
$this->call(QuestionsSeeder::class);
$this->call(ReportsSeeder::class);
    }
}
