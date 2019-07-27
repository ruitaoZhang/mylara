<?php

use Illuminate\Database\Seeder;

class LoginsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = factory(\App\Models\Login::class, 10)->make();
        \App\Models\Login::insert($datas->toArray());
    }
}
