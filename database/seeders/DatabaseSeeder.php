<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('contacts')->insert([
            [
                'first_name' => 'Peter',
                'last_name' => 'Dane',
                'email' => 'peter@example.com',
                'street' => '123 Main St',
                'city' => 'Minneapolis',
                'state' => 'MN',
                'zip' => '12345',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Paul',
                'last_name' => 'Lund',
                'email' => 'paul@example.com',
                'street' => '321 Main St',
                'city' => 'Minneapolis',
                'state' => 'MN',
                'zip' => '12344',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'James',
                'last_name' => 'Angle',
                'email' => 'james@example.com',
                'street' => '221 Second St',
                'city' => 'Minneapolis',
                'state' => 'MN',
                'zip' => '12234',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Ashley',
                'last_name' => 'Rogers',
                'email' => 'ash@example.com',
                'street' => '213 Main Ave',
                'city' => 'Minneapolis',
                'state' => 'MN',
                'zip' => '22211',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
