<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        function createUser($name, $username, $email, $password){
            User::create([
                'name' => $name,
                'username' => $username,
                'email' => $email,
                'password' => bcrypt($password),
            ]);
        }
        
        createUser('Dimas Yudistira', 'CLE4R', 'dimas@gmail.com', 'password');
        // createUser('Ira Rivera', 'Ira@gmail.com', 'password');
        // createUser('Rara Pajiron', 'rara@gmail.com', 'password');

        User::factory(4)->create();

        function createCategory($name, $slug){
            Category::create([
                'name' => $name,
                'slug' => $slug,
            ]);
        }

        createCategory('Programming', 'programming');
        createCategory('Web Design', 'web-design');
        createCategory('Personal', 'personal');

        Post::factory(20)->create();
    }
}
