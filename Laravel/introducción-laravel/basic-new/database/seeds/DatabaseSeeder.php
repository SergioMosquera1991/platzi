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
        App\User::create([
            'name'  => 'Sergio Eduardo Mosquera',
            'email' => 'sergio-1991_09@hotmail.com',
            'password' => bcrypt('12345678')
        ]);

        factory(App\Post::class, 24)->create();
    }
}
