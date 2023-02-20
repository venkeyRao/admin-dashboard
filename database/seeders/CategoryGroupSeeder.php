<?php

namespace Database\Seeders;

use App\Models\CategoryGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CategoryGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryGroupsData = Storage::disk('public')->get('ref_practice_group.json');
        $categoryGroups = json_decode($categoryGroupsData, true);

        foreach ($categoryGroups as $group) {
            CategoryGroup::create([
                'name' => $group['practice_group_name'],
                'key' => $group['practice_group_key'],
                'description' => $group['practice_group_description'],
                'meta_title' => $group['practice_group_meta_title'],
                'meta_description' => $group['practice_group_meta_desc'],
                'meta_key' => $group['practice_group_meta_key']
            ]);
        }
    }
}
