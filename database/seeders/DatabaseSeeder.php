<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Random;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->truncate();
        DB::table('job_listings')->truncate();
        DB::table('job_user_bookmarks')->truncate();
        DB::table('applicants')->truncate();


        $this->call((TestSeeder::class));
        $this->call((RandomUserSeeder::class));
        $this->call((JobSeeder::class));
        $this->call((BookmarkSedder::class));

    
    }
}
