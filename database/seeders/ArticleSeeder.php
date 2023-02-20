<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articleData = Storage::disk('public')->get('ref_article.json');
        $articles = json_decode($articleData, true);

        $categoryData = Storage::disk('public')->get('ref_practice.json');
        $categories = collect(json_decode($categoryData, true))->mapWithKeys(function ($g) {
            return [$g['practice_key'] => $g['practice_id']];
        })->toArray();

        foreach ($articles as $article) {
            $oldCategory = array_search($article['practice'], $categories);
            $category = Category::where('key', $oldCategory)->firstOrFail();

            Article::create([
                'name' => $article['article_name'],
                'key' => $article['article_key'],
                'image' => $article['article_image'],
                'description' => $article['article_description'],
                'meta_title' => $article['article_meta_title'],
                'meta_description' => $article['article_meta_desc'],
                'meta_key' => $article['article_meta_key'],
                'status' => !$article['article_private'],
                'category_id' => $category->id
            ]);
        }
    }
}
