<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class chatroomseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chatrooms')->insert([
            'name' => 'General'
        ]);
         DB::table('chatrooms')->insert([
            'name' => 'tech talk'
        ]);
    }
}
