<?php

use Illuminate\Database\Seeder;

class GoodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Goods::truncate();

        DB::table('goods')->insert([
            'name' => 'Cola',
            'description' => '2l',
            'image' => '/images/cola.jpg',
            'type' => 'beverages',
            'price_usd' => rand(500, 1500),
            'price_euro' => rand(500, 1500),
        ]);

        $pizzas = [
            'Margherita' => 'Cheese and tomato.',
            'Hawaiian' => 'Ham and pineapple.',
            'Classic' => 'Mushroom, bacon, and fresh tomato.',
            'American Hot' => 'Pepperoni, green pepper, onion, and chillies.',
            'BBQ Feast' => 'Onions, green peppers, bacon, spicy beef, and bbq sauce.',
            'BBQ Chicken' => 'Plain chicken, bbq sauce, onions, and green peppers.',
            'Chicken Supreme' => 'Chicken tikka, mushroom, green peppers, and sweetcorn.',
            'Vegetarian' => 'Mushrooms, green peppers, onions, and sweetcorn.',
            'Vegetarian Hot' => 'Mushrooms, green peppers, onions, and jalapeno.',
            'Meat Lovers' => 'Ham, beef, pepperoni, and bacon.'
        ];

        foreach ($pizzas as $name => $desc) {
            switch (rand(0, 4)) {
                case 1:
                    $priceUsd = rand(5, 15) * 100;
                    $priceEuro = rand(5, 15) * 100;
                    break;
                case 2:
                    $priceUsd = rand(500, 1500);
                    $priceEuro = rand(500, 1500);
                    break;
                default:
                    $priceUsd = rand(50, 150) * 10;
                    $priceEuro = rand(50, 150) * 10;
                    break;
            }

            DB::table('goods')->insert([
                'name' => $name,
                'description' => $desc,
                'image' => '/images/pizza.jpg',
                'type' => 'pizza',
                'price_usd' => $priceUsd,
                'price_euro' => $priceEuro,
            ]);
        }

        DB::table('goods')->insert([
            'name' => 'Juice',
            'description' => '1l',
            'image' => '/images/juice.jpg',
            'type' => 'beverages',
            'price_usd' => rand(500, 1500),
            'price_euro' => rand(500, 1500),
        ]);

        DB::table('goods')->insert([
            'name' => 'Caesar salad',
            'description' => '200g',
            'image' => '/images/caeser.jpg',
            'type' => 'salads',
            'price_usd' => rand(500, 1500),
            'price_euro' => rand(500, 1500),
        ]);

        DB::table('goods')->insert([
            'name' => 'Generic',
            'description' => 'using placeholder image',
            'image' => '',
            'type' => 'beverages',
            'price_usd' => rand(500, 1500),
            'price_euro' => rand(500, 1500),
        ]);

    }
}
