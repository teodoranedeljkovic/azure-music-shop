<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class  AlbumSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Models\Album');

        for($i=0; $i<=30; $i++){
            $album = \App\Models\Album::create([
                'name' => $faker->colorName,
                'dateReleased' => $faker->dateTimeThisCentury,
                'image' => $faker->image('public/storage/images',480,480, null, false),
                'length' => $faker->randomNumber(2),
                'description' => $faker->text,
            ]);
        }
    }
}
