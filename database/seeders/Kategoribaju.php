<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Kategoribaju extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $kategori =
            [
                [
                    'category_name' => 'Pakaian',
                ],
                [
                    'category_name' => 'Celana',
                ],
                [
                    'category_name' => 'Topi',
                ],
                [
                    'category_name' => 'Jas',
                ],
                [
                    'category_name' => 'Sepatu',
                ],
                [
                    'category_name' => 'Jaket',
                ],
                [
                    'category_name' => 'Tas',
                ],
                [
                    'category_name' => 'Dompet',
                ],
            ];

        \DB::table('kategoribajus')->insert($kategori);
    }
}
