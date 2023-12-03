<?php

namespace Database\Seeders;
use App\Models\Product;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $data = [
            [
                'image' => '',
                'name' => 'Hitrat',
                'description' => 'HitRat! #ratpoison merupakan umpan racun tikus berbentuk 
                block kecil yang sangat ampuh dan efektif basmi tikus hingga tuntas isi 30 gram. Rodentisida dengan teknologi 
                terbaik berbahan aktif Brodifacoum dirancang untuk membunuh tikus secara perlahan (slow action) dalam 3-7 hari, 
                sehingga tidak membuat curiga tikus lainya. 
                Tikus akan mati kurus kering tanpa meninggalkan bau busuk yang menyengat.                                ',
                'price' => 10000,
                'stok' => 20,
                'rating'=> 5,
                'id_category' => 2,
            ],
            [
                'image' => '',
                'name' => 'Hitrat',
                'description' => 'HitRat! #ratpoison merupakan umpan racun tikus berbentuk 
                block kecil yang sangat ampuh dan efektif basmi tikus hingga tuntas isi 100 gram. Rodentisida dengan teknologi 
                terbaik berbahan aktif Brodifacoum dirancang untuk membunuh tikus secara perlahan (slow action) dalam 3-7 hari, 
                sehingga tidak membuat curiga tikus lainya. 
                Tikus akan mati kurus kering tanpa meninggalkan bau busuk yang menyengat.                                ',
                'price' => 35000,
                'stok' => 20,
                'rating'=> 5,
                'id_category' => 2,
            ],
            [
                'image' => '',
                'name' => 'Hitrat',
                'description' => 'HitRat! #ratpoison merupakan umpan racun tikus berbentuk 
                block kecil yang sangat ampuh dan efektif basmi tikus hingga tuntas isi 200 gram. Rodentisida dengan teknologi 
                terbaik berbahan aktif Brodifacoum dirancang untuk membunuh tikus secara perlahan (slow action) dalam 3-7 hari, 
                sehingga tidak membuat curiga tikus lainya. 
                Tikus akan mati kurus kering tanpa meninggalkan bau busuk yang menyengat.                                ',
                'price' => 66000,
                'stok' => 20,
                'rating'=> 5,
                'id_category' => 2,
            ],
            [
                'image' => '',
                'name' => 'Hitrat',
                'description' => 'HitRat! #ratpoison merupakan umpan racun tikus berbentuk 
                block kecil yang sangat ampuh dan efektif basmi tikus hingga tuntas isi 450 gram. Rodentisida dengan teknologi 
                terbaik berbahan aktif Brodifacoum dirancang untuk membunuh tikus secara perlahan (slow action) dalam 3-7 hari, 
                sehingga tidak membuat curiga tikus lainya. 
                Tikus akan mati kurus kering tanpa meninggalkan bau busuk yang menyengat.                                ',
                'price' =>  120000,
                'stok' => 20,
                'rating'=> 5,
                'id_category' => 2,
                
            ],
            [
                'image' => '',
                'name' => 'Rat Rapellent',
                'description' => 'HitRat! #ratpoison merupakan umpan racun tikus berbentuk 
                block kecil yang sangat ampuh dan efektif basmi tikus hingga tuntas isi 450 gram. Rodentisida dengan teknologi 
                terbaik berbahan aktif Brodifacoum dirancang untuk membunuh tikus secara perlahan (slow action) dalam 3-7 hari, 
                sehingga tidak membuat curiga tikus lainya. 
                Tikus akan mati kurus kering tanpa meninggalkan bau busuk yang menyengat.                                ',
                'price' =>  55000,
                'stok' => 20,
                'rating'=> 5,
                'id_category' => 1,
                
            ],
           
        ];
        foreach($data as $d){
            Product::create($d);
        }
        
    }
}
