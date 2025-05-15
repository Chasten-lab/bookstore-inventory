<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::insert([
            ['name' => 'J.K. Rowling'],
            ['name' => 'George Orwell'],
            ['name' => 'J.R.R. Tolkien'],
            ['name' => 'Agatha Christie'],
            ['name' => 'Dan Brown'],
            ['name' => 'J.K. Rowling'],
            ['name' => 'Stephen King'],
            ['name' => 'Isaac Asimov'],
            ['name' => 'Arthur C. Clarke'],
            ['name' => 'Ray Bradbury'],
           
        ]);
    }
}
