<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    public $restaurantData = [
        [
            'id' =>  1,
            'name' =>  "ByProgrammers Burger",
            'rating' =>  4.8,
            'categories' =>  [5, 7],
            "priceRating" =>  'affordable',
            "photo" =>  'burger_restaurant_1',
            'duration' =>  "30 - 45 min",
            'location' =>  [
                'latitude' =>  -14,
                'longitude' =>  34
            ],
            'courier' =>  [
                'avatar' =>  'avatar_1',
                'name' =>  "Amy"
            ],
            'menu' =>  [
                [
                    'menuId' =>  1,
                    'name' =>  "Crispy Chicken Burger",
                    'photo' =>  'crispy_chicken_burger',
                    'description' =>  "Burger with crispy chicken, cheese and lettuce",
                    'calories' =>  200,
                    'price' =>  10
                ],
                [
                    'menuId' =>  2,
                    'name' =>  "Crispy Chicken Burger with Honey Mustard",
                    'photo' =>  'honey_mustard_chicken_burger',
                    'description' =>  "Crispy Chicken Burger with Honey Mustard Coleslaw",
                    'calories' =>  250,
                    'price' =>  15
                ],
                [
                    'menuId' =>  3,
                    'name' =>  "Crispy Baked French Fries",
                    'photo' =>  'baked_fries',
                    'description' =>  "Crispy Baked French Fries",
                    'calories' =>  194,
                    'price' =>  8
                ]
            ]
        ],
        [
            'id' =>  2,
            'name' =>  "ByProgrammers Pizza",
            'rating' =>  4.8,
            'categories' =>  [2, 4, 6],
            'priceRating' =>  'expensive',
            'photo' =>  'pizza_restaurant',
            'duration' =>  "15 - 20 min",
            'location' =>  [
                'latitude' =>  -13.9100160,
                'longitude' =>  33.7510400
            ],
            'courier' =>  [
                'avatar' =>  'avatar_2',
                'name' =>  "Jackson"
            ],
            'menu' =>  [
                [
                    'menuId' =>  4,
                    'name' =>  "Hawaiian Pizza",
                    'photo' =>  'hawaiian_pizza',
                    'description' =>  "Canadian bacon, homemade pizza crust, pizza sauce",
                    'calories' =>  250,
                    'price' =>  15
                ],
                [
                    'menuId' =>  5,
                    'name' =>  "Tomato & Basil Pizza",
                    'photo' =>  'pizza',
                    'description' =>  "Fresh tomatoes, aromatic basil pesto and melted bocconcini",
                    'calories' =>  250,
                    'price' =>  20
                ],
                [
                    'menuId' =>  6,
                    'name' =>  "Tomato Pasta",
                    'photo' =>  'tomato_pasta',
                    'description' =>  "Pasta with fresh tomatoes",
                    'calories' =>  100,
                    'price' =>  10
                ],
                [
                    'menuId' =>  7,
                    'name' =>  "Mediterranean Chopped Salad ",
                    'photo' =>  'salad',
                    'description' =>  "Finely chopped lettuce, tomatoes, cucumbers",
                    'calories' =>  100,
                    'price' =>  10
                ]
            ]
        ],
        [
            'id' =>  3,
            'name' =>  "ByProgrammers Hotdogs",
            'rating' =>  4.8,
            'categories' =>  [3],
            'priceRating' =>  'expensive',
            'photo' =>  'hot_dog_restaurant',
            'duration' =>  "20 - 25 min",
            'location' =>  [
                'latitude' =>  -13.9100160,
                'longitude' =>  33.7510400
            ],
            'courier' =>  [
                'avatar' =>  'avatar_3',
                'name' =>  "James"
            ],
            'menu' =>  [
                [
                    'menuId' =>  8,
                    'name' =>  "Chicago Style Hot Dog",
                    'photo' =>  'chicago_hot_dog',
                    'description' =>  "Fresh tomatoes, all beef hot dogs",
                    'calories' =>  100,
                    'price' =>  20
                ]
            ]
        ],
        [
            'id' =>  4,
            'name' =>  "ByProgrammers Sushi",
            'rating' =>  4.8,
            'categories' =>  [8],
            'priceRating' =>  'expensive',
            'photo' =>  'japanese_restaurant',
            'duration' =>  "10 - 15 min",
            'location' =>  [
                'latitude' =>  -13.9100160,
                'longitude' =>  33.7510400
            ],
            'courier' =>  [
                'avatar' =>  'avatar_4',
                'name' =>  "Ahmad"
            ],
            'menu' =>  [
                [
                    'menuId' =>  9,
                    'name' =>  "Sushi sets",
                    'photo' =>  'sushi',
                    'description' =>  "Fresh salmon, sushi rice, fresh juicy avocado",
                    'calories' =>  100,
                    'price' =>  50
                ]
            ]
        ],
        [
            'id' =>  5,
            'name' =>  "ByProgrammers Cuisine",
            'rating' =>  4.8,
            'categories' =>  [1, 2],
            'priceRating' =>  'affordable',
            'photo' =>  'noodle_shop',
            'duration' =>  "15 - 20 min",
            'location' =>  [
                'latitude' =>  -13.9100160,
                'longitude' =>  33.7510400
            ],
            'courier' =>  [
                'avatar' =>  'avatar_4',
                'name' =>  "Muthu"
            ],
            'menu' =>  [
                [
                    'menuId' =>  10,
                    'name' =>  "Kolo Mee",
                    'photo' =>  'kolo_mee',
                    'description' =>  "Noodles with char siu",
                    'calories' =>  200,
                    'price' =>  5
                ],
                [
                    'menuId' =>  11,
                    'name' =>  "Sarawak Laksa",
                    'photo' =>  'sarawak_laksa',
                    'description' =>  "Vermicelli noodles, cooked prawns",
                    'calories' =>  300,
                    'price' =>  8
                ],
                [
                    'menuId' =>  12,
                    'name' =>  "Nasi Lemak",
                    'photo' =>  'nasi_lemak',
                    'description' =>  "A traditional Malay rice dish",
                    'calories' =>  300,
                    'price' =>  8
                ],
                [
                    'menuId' =>  13,
                    'name' =>  "Nasi Briyani with Mutton",
                    'photo' =>  'nasi_briyani_mutton',
                    'description' =>  "A traditional Indian rice dish with mutton",
                    'calories' =>  300,
                    'price' =>  8
                ],
    
            ]
        ],
        [
    
            'id' =>  6,
            'name' =>  "ByProgrammers Dessets",
            'rating' =>  4.9,
            'categories' =>  [9, 10],
            'priceRating' =>  'affordable',
            'photo' =>  'kek_lapis_shop',
            'duration' =>  "35 - 40 min",
            'location' =>  [
                'latitude' =>  -13.9100160,
                'longitude' =>  33.7510400
            ],
            'courier' =>  [
                'avatar' =>  'avatar_1',
                'name' =>  "Jessie"
            ],
            'menu' =>  [
                [
                    'menuId' =>  12,
                    'name' =>  "Teh C Peng",
                    'photo' =>  'teh_c_peng',
                    'description' =>  "Three Layer Teh C Peng",
                    'calories' =>  100,
                    'price' =>  2
                ],
                [
                    'menuId' =>  13,
                    'name' =>  "ABC Ice Kacang",
                    'photo' =>  'ice_kacang',
                    'description' =>  "Shaved Ice with red beans",
                    'calories' =>  100,
                    'price' =>  3
                ],
                [
                    'menuId' =>  14,
                    'name' =>  "Kek Lapis",
                    'photo' =>  'kek_lapis',
                    'description' =>  "Layer cakes",
                    'calories' =>  300,
                    'price' =>  20
                ]
            ]
    
        ]
    ];
    
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\:factory(10)->create();
        $faker = \Faker\Factory::create();

        for ( $i = 0; $i < 6; $i++) {
            $name = $faker->name;
            DB::table('users')->insert([
                'username' => $name,
                'email' => str_replace(" ", "", $name).'@example.com',
                'phonenumber' => '0900'.rand(111111, 999999),
                'password' => Hash::make('12345678'),
                'role' => 'food service owner'
            ]);
        }

        for ( $i = 0; $i < 6; $i++) {
            $name = $faker->name;
            DB::table('users')->insert([
                'username' => $name,
                'email' => str_replace(" ", "", $name).'@example.com',
                'phonenumber' => '0900'.rand(111111, 999999),
                'password' => Hash::make('12345678'),
                'role' => 'delivery worker'
            ]);
        }

        foreach( $this->restaurantData as $i => $r) {

            DB::table('food_service')->insert([
                'userid' => $i + 1,
                'name' => $r['name'],
                'photo' => $r['photo'],
                'rating' => $r['rating'],
                'status' => 'active'
            ]);


            foreach($r['menu'] as $fooditem) {

                DB::table('food_item')->insert([
                    'foodserviceid' => $i + 1,
                    'name' => $fooditem['name'],
                    'photo' => $fooditem['photo'],
                    'description' => $fooditem['description'],
                    'price' => $fooditem['price'],
                    // 'rating' => $fooditem['rating'],
                    'status' => 'available'
                ]);
            }

            DB::table('delivery_workers')->insert([
                'userid' => $i + 7,
                'foodserviceid' => $i + 1,
                'status' => 'available'
            ]);

        }

        DB::table('users')->insert([
            'username' => 'john high',
            'email' => 'johnhigh@example.com',
            'phonenumber' => '0888748758',
            'password' => Hash::make('12345678'),
            'role' => 'customer'
        ]);

        DB::table('users')->insert([
            'username' => 'Mavi Mis',
            'email' => 'mavimis@example.com',
            'phonenumber' => '0995388994',
            'password' => Hash::make('12345678'),
            'role' => 'customer'
        ]);

        DB::table('users')->insert([
            'username' => 'Seneca',
            'email' => 'seneca@example.com',
            'phonenumber' => '0888707457',
            'password' => Hash::make('12345678'),
            'role' => 'customer'
        ]);

        DB::table('users')->insert([
            'username' => 'inno',
            'email' => 'inno@example.com',
            'phonenumber' => '0998936916',
            'password' => Hash::make('12345678'),
            'role' => 'administrator'
        ]);
    }
}
