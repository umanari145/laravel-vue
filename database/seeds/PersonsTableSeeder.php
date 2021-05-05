<?php

use Illuminate\Database\Seeder;
use App\Model\Persons;
use Faker\Factory as Faker;

// 下記コマンドでこのファイルを作成
//php artisan make:seeder PersonsTableSeeder

//下記コマンドでデータ作成ができる
//php artisan db:seed --class=PersonsTableSeeder
class PersonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //必要ならfaker利用
        $faker = Faker::create('ja_JP');

        //必要ならループ（ここをFactory使う）
        //https://qiita.com/Sa2Knight/items/fb82be7551cc84764267
        //https://helloworld-blog.tech/php/ダミーデータを生成するphpライブラリ-faker
        for($i = 0; $i < 10; $i++) {
            Persons::create([
                'person_name' => $faker->name,
                'sex' => $faker->randomElement([1,2]),
                'email' => $faker->email,
                'birth_day' => $faker->dateTimeBetween('-80 years', '-20years')->format('Y-m-d'),
                'zip' => $faker->postcode,
                'address_code'=> $faker->regexify('[1-9]{1}-[0-9]{3}-[0-9]{3}-[0-9]{3}') ,
                'address1' => $faker->prefecture . $faker->city ,
                'address2'=> $faker->streetAddress ,
                'email' => $faker->email,
                'tel'=> $faker->phoneNumber,
                'traffic' => json_encode($faker->randomElements([1, 2, 3, 4, 5], 2)),
                'contents' => $faker->realText(100)
            ]);
        }
    }
}
