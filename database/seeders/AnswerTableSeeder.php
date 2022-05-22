<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class AnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker::create();
        foreach(range(1,100)as $index){
            DB::table('answers')->insert([
                'answer_text'=>$faker->sentence(5),
                'own_variant'=>$faker->paragraph(4)
            ]);
        }


    }
}
