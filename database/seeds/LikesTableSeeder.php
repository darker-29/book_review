<?php

use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('likes')->truncate();
        factory(App\Like::class, 50)->create();
    }
}
