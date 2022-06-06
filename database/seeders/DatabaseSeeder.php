<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin123'),
            'isAdmin' => '1',
        ]);

        DB::table('voting')->insert([
            'user_id' => '1',
            'kandidat_id' => '1'
        ]);

        $this->call(ArticleSeeder::class);
        $this->call(KandidatSeeder::class);
    }
}
