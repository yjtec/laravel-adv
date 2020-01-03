<?php

use Illuminate\Database\Seeder;
use Yjtec\Adv\Models\Type;
class AdvTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['title' => '首页banner图'],
            ['title' => '旅游模块banner'],
            ['title' => '商家banner'],
            ['title' => '其他模块banner'],
            ['title' => '我的banner图'],
        ];
        Type::insert($data);
    }
}
