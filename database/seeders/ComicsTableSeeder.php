<?php

namespace Database\Seeders;

use App\Models\Comic;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        foreach (config("comics") as $comic) {
            $comic["artists"] = implode(",", $comic["artists"]);
            $comic["writers"] = implode(",", $comic["writers"]);
            Comic::create($comic);
        }
    }
}