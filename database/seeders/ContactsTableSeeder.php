<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactsTableSeeder extends Seeder
{
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Contact::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 10; $i++) {
            Contact::create([
                'name' => $faker->name,
                'phone' => $faker->e164PhoneNumber,
                'role' => $faker->jobTitle,
            ]);
        }
    }
}