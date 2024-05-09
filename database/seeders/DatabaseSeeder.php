<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Faq;
use App\Models\Book;
use App\Models\Payment;
use App\Models\User;
use App\Models\Author;
use App\Models\Category;
use App\Models\UserReview;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(FaqSeeder::class);
    }
}
