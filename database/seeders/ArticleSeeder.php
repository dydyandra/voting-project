<?php
namespace Database\Seeders;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();
        
        Article::factory(25)->create();

        Category::create([
            'name' => 'Berita Terkini',
            'slug' => 'berita-terkini'
        ]);

        Category::create([
            'name' => 'Berita Pemilu',
            'slug' => 'berita-pemilu'
        ]);

        Category::create([
            'name' => 'Hot News',
            'slug' => 'hot-news'
        ]);
    }
}