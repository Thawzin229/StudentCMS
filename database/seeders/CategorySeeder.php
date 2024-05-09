<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'ကလေးသူငယ်စာပေ'
        ]);

        Category::create([
            'name' => 'ဗဟုသုတ'
        ]);

        Category::create([
            'name' => 'မြန်မာနိုင်ငံအကြောင်းစာအုပ်များ'
        ]);

        Category::create([
            'name' => 'နိုင်ငံရေး'
        ]);

        Category::create([
            'name' => 'စီးပွားရေး'
        ]);

        Category::create([
            'name' => 'နည်းပညာ'
        ]);

        Category::create([
            'name' => 'ရသစာပေ'
        ]);

        Category::create([
            'name' => 'လူငယ့်ရေးရာ'
        ]);

        Category::create([
            'name' => 'ဘာသာရေး'
        ]);

        Category::create([
            'name' => 'ကျန်းမာရေး'
        ]);

        Category::create([
            'name' => 'စီမံခန့်ခွဲမှု'
        ]);

        Category::create([
            'name' => 'လူမှုစီးပွား'
        ]);

        Category::create([
            'name' => 'အတ္ထုပတ္တိ'
        ]);
    }
}
