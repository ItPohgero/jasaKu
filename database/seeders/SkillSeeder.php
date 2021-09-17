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
            'Bersih Rumah',
            'Semir Sepatu',
            'Memasak',
            'Laundry',
            'Potong Rumput',
            'Potografi',
            'Rias',
            'Jahit Kain',
        ]);
        $skill->each(function ($c) {
            Skill::create([
                'name'              => $c,
                'slug'              => Str::slug($c.' ' . Str::random(6)),
                'price'             => rand(30000, 100000),
                'an'                => '@kg',
            ]);
        });
    }
}
