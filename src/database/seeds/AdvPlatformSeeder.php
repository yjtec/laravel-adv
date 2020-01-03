<?php

use Illuminate\Database\Seeder;
use Yjtec\Adv\Models\Platform;
class AdvPlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['short_title' => 'android','title'=>'安卓端'],
            ['short_title' => 'web','title'=>'web端'],
            ['short_title' => 'ios','title'=>'ios端'],
            ['short_title' => 'wx','title'=>'微信端'],
            ['short_title' => 'pc','title'=>'电脑端'],
        ];
        Platform::insert($data);
    }
}
