<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("estudiantes")->insert([
            [
                "estudiante"=>"JOSE LOPEZ",
                "tutor"=>"PEDRO LOPEZ",
                "ciestudiante"=>"1010",
                "citutor"=>"1010",
                "rude"=>"1010",
                "parentesco"=>"PADRE",
                "colegio"=>"LA SALLE",
            ],
            [
                "estudiante"=>"FABIOLA LOPEZ",
                "tutor"=>"PEDRO LOPEZ",
                "ciestudiante"=>"1010",
                "citutor"=>"1010",
                "rude"=>"1010",
                "parentesco"=>"PADRE",
                "colegio"=>"ANGLO",
            ],
            [
                "estudiante"=>"ANAHI CAROLA",
                "tutor"=>"ANDRE CALLE",
                "ciestudiante"=>"89456",
                "citutor"=>"4516",
                "rude"=>"4566",
                "parentesco"=>"PADRE",
                "colegio"=>"ANGLO",
            ],
        ]);
    }
}
