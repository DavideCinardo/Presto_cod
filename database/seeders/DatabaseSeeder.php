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
            ['Motori', 'Motors', 'Motores', 'fa-solid fa-car'],
            ['Informatica', 'Informatics', 'Informatica', 'fa-solid fa-computer'],
            ['Casa', 'Home', 'Hogar', 'fa-solid fa-house'],
            ['Giochi', 'Games', 'Juegos', 'fa-solid fa-gamepad'],
            ['Lavoro', 'Work', 'Trabajar', 'fa-solid fa-briefcase'],
            ['Abbiglimento', 'Clothing', 'Ropa', 'fa-solid fa-person-dress'],
            ['Elettrodomestici', 'Domestic appliances', 'Usos domésticos', 'fa-solid fa-bolt'],
            ['Libri', 'Books', 'Libros', 'fa-solid fa-book'],
            ['Smartphone', 'Smartphone', 'Smartphone', 'fa-solid fa-mobile-screen'],
            ['Immobili', 'Property', 'Propiedades','fa-solid fa-building'],
        ];
        
        //per ogni categoria crea un record dando al name->category un valore dell'array
        foreach ($categories as $category){
            DB::table('categories')->insert([
                'nameIt' => $category[0],
                'nameEn' => $category[1],
                'nameEs' => $category[2],
                'icon' => $category[3],
            ]);
        };
    }
}