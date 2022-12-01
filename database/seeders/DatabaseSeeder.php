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
            ['Motori', 'Motors', 'Motores'], //<i class="fa-solid fa-car"></i>
            ['Informatica', 'Informatics', 'Informatica'], //<i class="fa-solid fa-computer"></i>
            ['Casa', 'Home', 'Hogar'], //<i class="fa-solid fa-house"></i>
            ['Giochi', 'Games', 'Juegos'], //<i class="fa-solid fa-gamepad"></i>
            ['Lavoro', 'Work', 'Trabajar'], //<i class="fa-solid fa-briefcase"></i>
            ['Abbiglimento', 'Clothing', 'Ropa'], //<i class="fa-solid fa-person-dress"></i>
            ['Elettrodomestici', 'Domestic appliances', 'Usos domésticos'], //<i class="fa-solid fa-bolt"></i>
            ['Libri', 'Books', 'Libros'], //<i class="fa-solid fa-book"></i>
            ['Smartphone', 'Smartphone', 'Smartphone'], //<i class="fa-solid fa-mobile-screen"></i>
            ['Immobili', 'Property', 'Propiedades'], //<i class="fa-solid fa-building"></i>
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