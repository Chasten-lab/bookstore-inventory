<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $entries = [
            [
                'date' => '2023-09-01',
                'title' => 'Harry Potter and the Sorcerer\'s Stone',
                'author_name' => 'J.K. Rowling',
                'category_name' => 'Fantasy',
                'publisher_name' => 'Penguin Random House',
                'price' => 19.99,
                'stock' => 100,
            ],
            [
                'date' => '2023-10-01',
                'title' => '1984',
                'author_name' => 'George Orwell',
                'category_name' => 'Fiction',
                'publisher_name' => 'HarperCollins',
                'price' => 15.50,
                'stock' => 80,
            ],
            [
                'date' => '2023-11-01',
                'title' => 'The Hobbit',
                'author_name' => 'J.R.R. Tolkien',
                'category_name' => 'Fantasy',
                'publisher_name' => 'Hachette',
                'price' => 17.25,
                'stock' => 50,
            ],
            [
                'date' => '2023-12-01',
                'title' => 'Murder on the Orient Express',
                'author_name' => 'Agatha Christie',
                'category_name' => 'Mystery',
                'publisher_name' => 'Macmillan',
                'price' => 14.99,
                'stock' => 70,
            ],
            [
                'date' => '2024-01-01',
                'title' => 'Animal Farm',
                'author_name' => 'George Orwell',
                'category_name' => 'Fiction',
                'publisher_name' => 'HarperCollins',
                'price' => 13.40,
                'stock' => 60,
            ],
            [
                'date' => '2024-02-01',
                'title' => 'The Lord of the Rings',
                'author_name' => 'J.R.R. Tolkien',
                'category_name' => 'Fantasy',
                'publisher_name' => 'Hachette',
                'price' => 25.00,
                'stock' => 40,
            ],
            [
                'date' => '2024-03-01',
                'title' => 'The Casual Vacancy',
                'author_name' => 'J.K. Rowling',
                'category_name' => 'Fiction',
                'publisher_name' => 'Penguin Random House',
                'price' => 18.00,
                'stock' => 30,
            ],
            [ 
                'date' => '2024-04-01',
                'title' => 'And Then There Were None',
                'author_name' => 'Agatha Christie',
                'category_name' => 'Mystery',
                'publisher_name' => 'Macmillan',
                'price' => 12.75,
                'stock' => 90,
            ],
            [
                'date' => '2024-05-01',
                'title' => 'The Silmarillion',
                'author_name' => 'J.R.R. Tolkien',
                'category_name' => 'Fantasy',
                'publisher_name' => 'Hachette',
                'price' => 21.90,
                'stock' => 35,
            ],
            [

                'date' => '2024-06-01',
                'title' => 'Fantastic Beasts and Where to Find Them',
                'author_name' => 'J.K. Rowling',
                'category_name' => 'Fantasy',
                'publisher_name' => 'Penguin Random House',
                'price' => 16.50,
                'stock' => 65,
            ],
        ];

        foreach ($entries as $entry) {
            $author = Author::firstOrCreate(['name' => $entry['author_name']]);
            $category = Category::firstOrCreate(['name' => $entry['category_name']]);
            $publisher = Publisher::firstOrCreate(['name' => $entry['publisher_name']]);

            Book::create([
                'title' => $entry['title'],
                'author_id' => $author->id,
                'category_id' => $category->id,
                'publisher_id' => $publisher->id,
                'price' => $entry['price'],
                'stock' => $entry['stock'],
                'date' => $entry['date'],
            ]);
        }
    }
}
