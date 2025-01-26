<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Posts;
use Database\Factories\PostsFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();
        User::create([
            'name' => 'Dandy Wahyudin',
            'username' => 'dandywahyudin',
            'email' => 'dandywahyudin19@gmail.com',
            'password' => bcrypt('12345')
        ]);
        // User::create([
        //     'name' => 'Rizki Febian',
        //     'email' => 'rizkifeb@gmail.com',
        //     'password' => bcrypt('123456')
        // ]);
        Category::create([
            'name' => 'Web Developer',
            'slug' => 'web-developer'
        ]);
        Category::create([
            'name' => 'Machine Learning',
            'slug' => 'machine-learning'
        ]);
        Category::create([
            'name' => 'Data Science',
            'slug' => 'Data Science'
        ]);
        Posts::factory(20)->create();
        // Posts::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate pariatur hic temporibus beatae?</p><p> Non vel illo animi enim, totam delectus molestias velit molestiae! Assumenda autem culpa ullam. Quod nobis dolores voluptatem, debitis quisquam ratione iusto magnam sint omnis tempore quidem deserunt impedit enim ut, sapiente harum adipisci, itaque incidunt illo quibusdam. Fugiat explicabo hic natus tenetur doloribus temporibus voluptatem sint provident sed nemo itaque deserunt, praesentium cum ab minus autem non corporis et quod impedit dolorum odio sequi earum. Explicabo, reprehenderit necessitatibus doloremque eveniet consectetur reiciendis possimus! Sed, incidunt culpa, eveniet error laudantium fugiat amet reiciendis delectus aperiam voluptas asperiores. Expedita sunt quas odit tempora aspernatur dolorum id provident nulla numquam facilis repellat placeat iusto, totam pariatur deserunt fugit sequi optio eius. Aut eius, ab similique corrupti natus magni eaque, aliquam, doloremque delectus dolor ipsum dolorem dolorum? Rem consequatur ea modi labore temporibus ipsa ex, fugiat nihil cumque ut dicta.</p>',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
    }
}
