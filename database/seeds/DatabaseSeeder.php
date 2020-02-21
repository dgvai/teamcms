<?php

use App\Models\Blogs\Blogs;
use App\Models\Team\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // factory(User::class,50)->create()->each(function($user){
        //     $user->details()->create(['first_name' => 'John'.mt_rand(0,9), 'last_name' => 'Doe'.mt_rand(0,9)]);
        // });

        // factory(Blogs::class, 100)->create();
    }
}
