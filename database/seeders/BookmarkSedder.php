<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookmarkSedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //test user id 
        $testUserId = User::where('email', 'test@test.com')->firstOrFail();

        //job ids
        $jobIds = Job::pluck('id')->toArray();

        //random select job id for bookmarks
        $randomJobIds = array_rand($jobIds, 3);

        foreach ($randomJobIds as $jobId) {
            $testUserId->bookmarkedJobs()->attach($jobIds[$jobId]);
        }
    }
}
