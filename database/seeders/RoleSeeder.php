<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = collect([
            'admin',
            'worker',
            'client',
        ]);   
        $role->each(function ($c) {
            Role::create([
                'name'              => $c,
                'guard_name'        => 'web'
            ]);
        });
    }
}
