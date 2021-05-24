<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['username' => 'Manager', 'email' => 'manager@gmail.com', 'password' => bcrypt('managermanager'), 'address' => 'Flowelto Street', 'gender' => 'male', 'DOB' => '11 December 2020', 'role' => 'Manager'],
            ['username' => 'Customer', 'email' => 'customer@gmail.com', 'password' => bcrypt('customercustomer'), 'address' => 'Flowelto Street', 'gender' => 'male', 'DOB' => '11 December 2020', 'role' => 'Customer']
        ]);

        DB::table('categories')->insert([
            ['name' => 'Hand Bouquet', 'image' => 'hand.png'],
            ['name' => 'Wedding Bouquet', 'image' => 'wedding.png'],
            ['name' => 'Table Arrangement', 'image' => 'table.png'],
            ['name' => 'Money Flower Bouquet', 'image' => 'money.png'],
        ]);

        DB::table('flowers')->insert([
            ['category_id' => 1, 'name' => 'Lovely Dovey', 'price' => 180000, 'image' => 'lovely.png', 'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dicta aperiam ea animi consequatur eius autem aliquid magni inventore accusamus.'],
            ['category_id' => 2, 'name' => 'Aurora Rose', 'price' => 80000, 'image' => 'aurora.png', 'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dicta aperiam ea animi consequatur eius autem aliquid magni inventore accusamus.'],
            ['category_id' => 3, 'name' => 'Blue Ocean Rose', 'price' => 200000, 'image' => 'blue.png', 'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dicta aperiam ea animi consequatur eius autem aliquid magni inventore accusamus.'],
            ['category_id' => 3, 'name' => 'Angels Rose', 'price' => 150000, 'image' => 'angels.png', 'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dicta aperiam ea animi consequatur eius autem aliquid magni inventore accusamus.'],
        ]);
    }
}