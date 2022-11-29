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
        $categories =[
            ['Motori', 'Motors', 'Motores'],
            ['Informatica', 'Informatics', 'Informatica'],
            ['Casa', 'Home', 'Hogar'],
            ['Giochi', 'Games', 'Juegos'],
            ['Lavoro', 'Work', 'Trabajar'],
            ['Abbiglimento', 'Clothing', 'Ropa'],
            ['Elettrodomestici', 'Domestic appliances', 'Usos domésticos'],
            ['Libri', 'Books', 'Libros'],
            ['Smartphone', 'Smartphone', 'Smartphone'],
            ['Immobili', 'Property', 'Propiedades'],
        ];
        
        //per ogni categoria crea un record dando al name->category un valore dell'array
        foreach ($categories as $category){
            DB::table('categories')->insert([
                'nameIt' => $category[0],
                'nameEn' => $category[1],
                'nameEs' => $category[2],
            ]);
        };
    }
}

// ['Motori', 'Informatica', 'Casa', 'Giochi', 'Lavoro', 'Abbigliamento', 'Elettrodomestici', 'Libri', 'Smartphone', 'Immobili'],
// ['Motors', 'Informatic', 'Home', 'Games', 'Work', 'Clothing', 'Domestic appliances', 'Books', 'Smartphone', 'Property'],
// ['Motores', 'Informatica', 'Hogar', 'Juegos', 'Trabajar', 'Ropa', 'Usos domésticos', 'Libros', 'Smartphone', 'Propiedades'],