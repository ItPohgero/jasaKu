<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skill = collect([
            'Home Service',
            'Cleaning Service',
            'Semir Sepatu',
            'Memasak',
            'Laundry',
            'Potong Rumput'
        ]);
        $skill->each(function ($c) {
            Skill::create([
                'name'              => $c,
                'slug'              => Str::slug($c)
            ]);
        });
    }
}