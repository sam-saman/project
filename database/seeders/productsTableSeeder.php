<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class productsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        DB::table('products')->insert([
            [
            'p_name'=>'Samsung Galaxy Note 20',
            'brand'=>'Samsung galaxy',
            'price'=>'30000',
            'image'=>'https://static.toiimg.com/photo/74562423.cms',
 
        ],
        [
            'p_name'=>'SAMSUNG GALAXY A10S',
            'brand'=>'Samsung galaxy',
            'price'=>' 15,979',
            'image'=>'https://cdn.shopify.com/s/files/1/0401/9070/5820/products/A10s-blue_1024x1024.jpg?v=1623995064',
 
        ],
        [
            'p_name'=>'REDMI NOTE 10 PRO',
            'brand'=>'Redmi',
            'price'=>' 47,999',
            'image'=>'https://cdn.shopify.com/s/files/1/0401/9070/5820/products/Gol_1024x1024.jpg?v=1623993893',
 
        ],
        [
            'p_name'=>'IPHONE 12 PRO MAX',
            'brand'=>'IPHONE',
            'price'=>'224,361',
            'image'=>'https://cdn.shopify.com/s/files/1/0401/9070/5820/products/Pacific-Blue_94483d42-93a9-4b4e-ad65-7f7298aac3cb_1024x1024.png?v=1623992860',
 
        ],
        [
            'p_name'=>'Samsung 12',
            'brand'=>'Samsung Galaxy',
            'price'=>'22000',
            'image'=>'https://assetscdn1.paytm.com/images/catalog/product/M/MO/MOBOPPO-A52-6-GFUTU6297453D3D253C/1592019058170_0..png',
            ]
        ]);
    }
}
