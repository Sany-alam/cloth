<?php

use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $domain = array(
            array(
                array('T-Shirts','Casual Shirts','Formal Shirts','Sweatshirts','Sweaters','Jackets'),
                array('Jeans','Casual Trousers','Formal Trousers','Shorts','Track Pants & Joggers'),
                array('Casual Shoes','Sports Shoes','Formal Shoes','Sneakers','Sandals & Floaters','Flip Flops','Socks'),
                array('Sports Shoes','Sports Sandals','Active T-Shirts','Track Pants & Shorts','Tracksuits','Jackets & Sweatshirts'),
                array('Wallets','Belts','Mufflers, Scarves & Gloves','Ties, Cufflinks & Pocket Squares','Caps & Hats'),
            ),
            array(
                array('Kurtas & Suits','Ethnic Dresses','Kurtis, Tunics & Tops','Skirts & Palazzos'),
                array('Flats','Casual Shoes','Heels','Boots','Sports Shoes & Floaters'),
                array('Bras & Lingerie Sets','Briefs','Shapewear','Sleepwear & Loungewear'),
            ),
            array(
                array('T-Shirts','Shirts','Shorts','Jeans','Trousers','Clothing Sets'),
                array('Dresses','Tops','Tshirts','Clothing Sets','Skirts & shorts','Jeans, Trousers & Capris'),
                array(),
                array(),
            ),
        );

        $serial = 1;
        foreach ($domain as $dom_key => $domains) {
            foreach ($domains as $cat_key => $categories) {
                foreach ($categories as $subcat_key => $subcategory) {
                    App\Subcategory::create([
                        'category_id'=>$serial,
                        'name'=>$subcategory,
                        'slug'=>str_slug($subcategory),
                    ]);
                } $serial++;
            }
        }


    }
}
