<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
            BranchSeeder::class,
            CustomerSeeder::class,
            RequestTypeSeeder::class,
            TransactionTypeSeeder::class,
            TransactionFeatureSeeder::class,
            ReasonClaimSeeder::class
        ]);
    }
}
