<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(channel::class);
    }

}

class channel extends Seeder
{

    public function run()
    {
        //
        DB::table('channels')->insert(
            [
                ['name'=>'First','description'=>'Тестовый канал'],
                ['name'=>'Second','description'=>'Тестовый']
            ]
        );


    }
}
