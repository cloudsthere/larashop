<?php

use App\Models\Goods;
use Illuminate\Database\Seeder;

class GoodsPicturesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = new Faker\Generator;
        $faker->addProvider(new Faker\Provider\Image($faker));
        $goods_ids = Goods::lists('goods_id')->all();

        foreach ($goods_ids as $goods_id) {
            $inserts[] = [
                    'goods_id' => $goods_id,
                    'link' => $faker->imageUrl(100, 100),
                    'is_cover' => 1,
                ];
        }

        \DB::table('goods_pictures')->insert($inserts);

        for ($i = 0; $i < 20; $i++) {
            $data[] = [
                    'goods_id' => $goods_ids[mt_rand(0, count($goods_ids) -1)],
                    'link' => $faker->imageUrl(100, 100),
                    'is_cover' => 0,
                ];
        }

        \DB::table('goods_pictures')->insert($data);

    }
}
