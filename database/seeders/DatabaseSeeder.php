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
            'name' => "Muhammad Advie Rifaldy",
            'email' => "madvier83@gmail.com",
            'password' => bcrypt("adminadmin"),
            'address' => "Bandung, katapang, Komp. paledang indah 2 blok e 1-3 no 1 rt 2 rw 13",
            'phone' => "+62823 7693 2445",
        ]);
        User::create([
            'name' => "Czans",
            'email' => "madvier84@gmail.com",
            'password' => bcrypt("adminadmin"),
            'address' => "Bandung, katapang, Komp. paledang indah 2 blok e 1-3 no 1 rt 2 rw 13",
            'phone' => "+62823 7693 2005",
        ]);

        Product::create([
            'name' => 'Test product 1',
            'user_id' => 1,
            'category_id' => 3,
            'description' => '<div><strong><br>Different By Design<br></strong><br></div><div>Most WYSIWYG editors are wrappers around HTML’s contenteditable and execCommand APIs, designed by Microsoft to support live editing of web pages in Internet Explorer 5.5, and <a href="https://blog.whatwg.org/the-road-to-html-5-contenteditable#history">eventually reverse-engineered</a> and copied by other browsers.<br><br></div><div>Because these APIs were never fully specified or documented, and because WYSIWYG HTML editors are enormous in scope, each browser’s implementation has its own set of bugs and quirks, and JavaScript developers are left to resolve the inconsistencies.<br><br></div><div>Trix sidesteps these inconsistencies by treating contenteditable as an I/O device: when input makes its way to the editor, Trix converts that input into an editing operation on its internal document model, then re-renders that document back into the editor. This gives Trix complete control over what happens after every keystroke, and avoids the need to use execCommand at all.<br><br></div>',
            'image' => 'product-images\RMWdoaiTwRRUdnrP0Rr3phOKpJmelP3xl1TnDK0M.webp',
            'price' => 120000,
            'stock' => 12,
            'timestamp' => '2022-10-29 15:17:23'
            
        ]);
        Product::create([
            'name' => 'Test product 1',
            'user_id' => 1,
            'category_id' => 3,
            'description' => '<div><strong><br>Different By Design<br></strong><br></div><div>Most WYSIWYG editors are wrappers around HTML’s contenteditable and execCommand APIs, designed by Microsoft to support live editing of web pages in Internet Explorer 5.5, and <a href="https://blog.whatwg.org/the-road-to-html-5-contenteditable#history">eventually reverse-engineered</a> and copied by other browsers.<br><br></div><div>Because these APIs were never fully specified or documented, and because WYSIWYG HTML editors are enormous in scope, each browser’s implementation has its own set of bugs and quirks, and JavaScript developers are left to resolve the inconsistencies.<br><br></div><div>Trix sidesteps these inconsistencies by treating contenteditable as an I/O device: when input makes its way to the editor, Trix converts that input into an editing operation on its internal document model, then re-renders that document back into the editor. This gives Trix complete control over what happens after every keystroke, and avoids the need to use execCommand at all.<br><br></div>',
            'image' => 'product-images\RMWdoaiTwRRUdnrP0Rr3phOKpJmelP3xl1TnDK0M.webp',
            'price' => 175000,
            'stock' => 12,
            'timestamp' => '2022-10-29 15:17:23'
            
        ]);

        Category::create([
            'name' => 'Elektronik',
            'slug' => 'elektronik',
        ]);
        Category::create([
            'name' => 'Fashion',
            'slug' => 'fashion',
        ]);
        Category::create([
            'name' => 'Digital',
            'slug' => 'digital',
        ]);
    }
}
