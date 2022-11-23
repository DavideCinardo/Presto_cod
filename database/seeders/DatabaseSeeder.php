<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Categorie inserite lato server
        $categories = ['Motori', 'Informatica', 'Casa', 'Giochi', 'Lavoro', 'Abbigliamento', 'Elettrodomestici', 'Libri', 'Smartphone', 'Immobili'];

        //per ogni categoria crea un record dando al name->category un valore dell'array
        foreach ($categories as $category){
            DB::table('categories')->insert([
                'name' => $category
            ]);
        };
    }
}
