<?php

use Illuminate\Database\Seeder;

class LabelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('labels')->insert([
            ['label' => 'Labour'],
            ['label' => 'Conservative'],
            ['label' => 'Unknown'],
        ]);
    }
}
