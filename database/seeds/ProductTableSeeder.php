<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=30; $i++){

            Product::create([
                'name'=>'Laptop '.$i,
                'slug'=>'laptop-'.$i,
                'detail'=>[13,14,15][array_rand([13,14,15])].' inch, '.[1,2,3][array_rand([1,2,3])]. ' TB SSD 32GB RAM ',
                'price'=>rand(149999, 249999),
                'description'=>'Lorem, '.$i.' ipsum dolor sit amet consectetur adipisicing elit. Cum numquam doloremque sequi, saepe ullam qui, aspernatur commodi fugiat earum officia voluptates. In placeat repellat totam alias. Facere similique repellat mollitia?',
            ])->categories()->attach(1);
        }
        $product = Product::find(1);
        $product->categories()->attach(2);

        for($i=1; $i<=9; $i++){

            Product::create([
                'name'=>'Desktop '.$i,
                'slug'=>'desktop-'.$i,
                'detail'=>[3,4,5][array_rand([3,4,5])].' inch, '.[1,2,3][array_rand([1,2,3])]. ' TB SSD 32GB RAM ',
                'price'=>rand(149999, 249999),
                'description'=>'Lorem, '.$i.' ipsum dolor sit amet consectetur adipisicing elit. Cum numquam doloremque sequi, saepe ullam qui, aspernatur commodi fugiat earum officia voluptates. In placeat repellat totam alias. Facere similique repellat mollitia?',
            ])->categories()->attach(2);
        }


        for($i=1; $i<=9; $i++ ){

            Product::create([
                'name'=>'Mobile Phones '.$i,
                'slug'=>'phone-'.$i,
                'detail'=>[13,14,15][array_rand([13,14,15])].' inch, '.[1,2,3][array_rand([1,2,3])]. ' TB SSD 32GB RAM ',
                'price'=>rand(149999, 249999),
                'description'=>'Lorem, '.$i.' ipsum dolor sit amet consectetur adipisicing elit. Cum numquam doloremque sequi, saepe ullam qui, aspernatur commodi fugiat earum officia voluptates. In placeat repellat totam alias. Facere similique repellat mollitia?',
            ])->categories()->attach(3);
        }


        for($i=1; $i<=9; $i++ ){

            Product::create([
                'name'=>'Tablets '.$i,
                'slug'=>'tablet-'.$i,
                'detail'=>[13,14,15][array_rand([13,14,15])].' inch, '.[1,2,3][array_rand([1,2,3])]. ' TB SSD 32GB RAM ',
                'price'=>rand(149999, 249999),
                'description'=>'Lorem, '.$i.' ipsum dolor sit amet consectetur adipisicing elit. Cum numquam doloremque sequi, saepe ullam qui, aspernatur commodi fugiat earum officia voluptates. In placeat repellat totam alias. Facere similique repellat mollitia?',
            ])->categories()->attach(4);
        }


        for($i=1; $i<=9; $i++ ){

            Product::create([
                'name'=>'Tvs '.$i,
                'slug'=>'tv-'.$i,
                'detail'=>[13,14,15][array_rand([13,14,15])].' inch, '.[1,2,3][array_rand([1,2,3])]. ' TB SSD 32GB RAM ',
                'price'=>rand(149999, 249999),
                'description'=>'Lorem, '.$i.' ipsum dolor sit amet consectetur adipisicing elit. Cum numquam doloremque sequi, saepe ullam qui, aspernatur commodi fugiat earum officia voluptates. In placeat repellat totam alias. Facere similique repellat mollitia?',
            ])->categories()->attach(5);
        }


        for($i=1; $i<=9; $i++ ){

            Product::create([
                'name'=>'Digital Cameras '.$i,
                'slug'=>'camera-'.$i,
                'detail'=>[13,14,15][array_rand([13,14,15])].' inch, '.[1,2,3][array_rand([1,2,3])]. ' TB SSD 32GB RAM ',
                'price'=>rand(149999, 249999),
                'description'=>'Lorem, '.$i.' ipsum dolor sit amet consectetur adipisicing elit. Cum numquam doloremque sequi, saepe ullam qui, aspernatur commodi fugiat earum officia voluptates. In placeat repellat totam alias. Facere similique repellat mollitia?',
            ])->categories()->attach(6);
        }


        for($i=1; $i<=9; $i++ ){

            Product::create([
                'name'=>'Appliances '.$i,
                'slug'=>'appliance-'.$i,
                'detail'=>[13,14,15][array_rand([13,14,15])].' inch, '.[1,2,3][array_rand([1,2,3])]. ' TB SSD 32GB RAM ',
                'price'=>rand(149999, 249999),
                'description'=>'Lorem, '.$i.' ipsum dolor sit amet consectetur adipisicing elit. Cum numquam doloremque sequi, saepe ullam qui, aspernatur commodi fugiat earum officia voluptates. In placeat repellat totam alias. Facere similique repellat mollitia?',
            ])->categories()->attach(7);
        }

    }
}
