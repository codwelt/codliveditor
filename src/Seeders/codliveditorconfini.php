<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class codliveditorconfini extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('codliveditorconf')->insert([
            'tipostorage' => 'local',
            'tiporender' => '0',
            'html' => 1,
            'css' => 1,
            'js' => 0,
            'php' => 0,
            'idframeworkfront' => 0
        ]);
    }
}
