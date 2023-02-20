<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryData = Storage::disk('public')->get('ref_practice.json');
        $categories = json_decode($categoryData, true);

        $categoryGroupsData = Storage::disk('public')->get('ref_practice_group.json');
        $categoryGroups = collect(json_decode($categoryGroupsData, true))->mapWithKeys(function ($g) {
           return [$g['practice_group_key'] => $g['practice_group_id']];
        })->toArray();

        foreach ($categories as $category) {
            $oldGroup = array_search($category['practice_group'], $categoryGroups);
            $group = CategoryGroup::where('key', $oldGroup)->firstOrFail();

            Category::create([
                'name' => $category['practice_name'],
                'key' => $category['practice_key'],
                'description' => $category['practice_description'],
                'meta_title' => $category['practice_meta_title'],
                'meta_description' => $category['practice_meta_desc'],
                'meta_key' => $category['practice_meta_key'],
                'type' => $category['practice_directory_type'],
                'group_id' => $group->id
            ]);
        }
    }
}
