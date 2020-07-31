<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(BlogsTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(SubscribersTableSeeder::class);
        $this->call(Blogs_related_blogsTableSeeder::class);
        $this->call(SupportsTableSeeder::class);
    }
}
