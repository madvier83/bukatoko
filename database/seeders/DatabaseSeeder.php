<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => "Admin",
            'role' => "admin",
            'email' => "admin83@gmail.com",
            'password' => bcrypt("adminadmin"),
            'address' => "Kab. Bandung, Jawa Barat, Desa Bojong Kunci, Kec. Pameungpeuk, Komp. Paledang Indah 2 blok E 1-3 no 1 RT 2 RW 13",
            'phone' => "+62 823 7693 2445",
        ]);
        User::create([
            'name' => "Advie Admin",
            'email' => "madvier83@gmail.com",
            'password' => bcrypt("adminadmin"),
            'address' => "Kab. Bandung, Jawa Barat, Desa Bojong Kunci, Kec. Pameungpeuk, Komp. Paledang Indah 2 blok E 1-3 no 1 RT 2 RW 13",
            'phone' => "+62 823 7693 2445",
        ]);
        User::create([
            'name' => "Muhammad Advie Rifaldy",
            'email' => "madvier84@gmail.com",
            'password' => bcrypt("adminadmin"),
            'address' => "Kab. Bandung, Jawa Barat, Desa Bojong Kunci, Kec. Pameungpeuk, Komp. Paledang Indah 2 blok E 1-3 no 1 RT 2 RW 13",
            'phone' => "+62 823 7693 2005",
        ]);

        Product::create([
            'name' => 'Test product 1',
            'user_id' => 2,
            'category_id' => 2,
            'description' => "<div>What is Lorem Ipsum?<br><br></div><div><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br><br></div>",
            'image' => 'product-images\ekUoQJcKjYsthByTsxlux1PYfIWjvIWMcMoyw7pR.webp',
            'price' => 275000,
            'stock' => 12,
            'timestamp' => '2022-10-29 15:17:23'

        ]);
        Product::create([
            'name' => 'Test product 2',
            'user_id' => 2,
            'category_id' => 2,
            'description' => "<div>What is Lorem Ipsum?<br><br></div><div><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br><br></div>",
            'image' => 'product-images\RMWdoaiTwRRUdnrP0Rr3phOKpJmelP3xl1TnDK0M.webp',
            'price' => 175000,
            'stock' => 12,
            'timestamp' => '2022-10-29 15:17:23'

        ]);
        Product::create([
            'name' => 'Test product 3',
            'user_id' => 2,
            'category_id' => 2,
            'description' => "<div>What is Lorem Ipsum?<br><br></div><div><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br><br></div>",
            'image' => 'product-images\oxVj4lBdutjdWhpiMnkjNsxSm6sQTERXwKP7mvSx.png',
            'price' => 120000,
            'stock' => 12,
            'timestamp' => '2022-10-29 15:17:23'

        ]);

        Category::create([
            'name' => 'Elektronik',
            'slug' => 'elektronik',
        ]);
        Category::create([
            'name' => 'Digital',
            'slug' => 'digital',
        ]);
        Category::create([
            'name' => 'Pakaian',
            'slug' => 'pakaian',
        ]);
        Category::create([
            'name' => 'Furnitur',
            'slug' => 'furnitur',
        ]);
        Category::create([
            'name' => 'Makanan',
            'slug' => 'makanan',
        ]);
    }
}
