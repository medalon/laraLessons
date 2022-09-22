<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Contact;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Company::factory()->count(10)->create();
        // Contact::factory()->count(50)->create();

        User::factory()->count(5)->create();
        Company::factory()->hasContacts(5)->count(50)->create();
    }
}
