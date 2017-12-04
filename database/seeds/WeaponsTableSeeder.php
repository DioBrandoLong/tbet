<?php

use App\Models\Weapons;
use Illuminate\Database\Seeder;
use App\Models\Weapon;

class WeaponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_ids = ['1', '2', '3'];
        $faker = app(Faker\Generator::class);
        $w = factory(Weapons::class)->times(100)->make()->each(function ($weapons) use ($faker, $user_ids) {
            $weapons->user_id = $faker->randomElement($user_ids);
        });

        Weapon::insert($w->toArray());

    }
}
