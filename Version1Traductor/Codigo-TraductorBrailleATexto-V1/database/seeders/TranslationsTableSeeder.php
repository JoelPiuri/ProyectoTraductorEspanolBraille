<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TranslationsTableSeeder extends Seeder
{
    public function run()
    {
        // Vaciar la tabla antes de insertar nuevos datos
        DB::table('translations')->truncate();
        $translations = [
            
            //letras
            ['caracterEspanol' => 'a', 'braille' => '⠁'],
            ['caracterEspanol' => 'b', 'braille' => '⠃'],
            ['caracterEspanol' => 'c', 'braille' => '⠉'],
            ['caracterEspanol' => 'd', 'braille' => '⠙'],
            ['caracterEspanol' => 'e', 'braille' => '⠑'],
            ['caracterEspanol' => 'f', 'braille' => '⠋'],
            ['caracterEspanol' => 'g', 'braille' => '⠛'],
            ['caracterEspanol' => 'h', 'braille' => '⠓'],
            ['caracterEspanol' => 'i', 'braille' => '⠊'],
            ['caracterEspanol' => 'j', 'braille' => '⠚'],
            ['caracterEspanol' => 'k', 'braille' => '⠅'],
            ['caracterEspanol' => 'l', 'braille' => '⠇'],
            ['caracterEspanol' => 'm', 'braille' => '⠍'],
            ['caracterEspanol' => 'n', 'braille' => '⠝'],
            ['caracterEspanol' => 'o', 'braille' => '⠕'],
            ['caracterEspanol' => 'p', 'braille' => '⠏'],
            ['caracterEspanol' => 'q', 'braille' => '⠟'],
            ['caracterEspanol' => 'r', 'braille' => '⠗'],
            ['caracterEspanol' => 's', 'braille' => '⠎'],
            ['caracterEspanol' => 't', 'braille' => '⠞'],
            ['caracterEspanol' => 'u', 'braille' => '⠥'],
            ['caracterEspanol' => 'v', 'braille' => '⠧'],
            ['caracterEspanol' => 'w', 'braille' => '⠺'],
            ['caracterEspanol' => 'x', 'braille' => '⠭'],
            ['caracterEspanol' => 'y', 'braille' => '⠽'],
            ['caracterEspanol' => 'z', 'braille' => '⠵'],
            ['caracterEspanol' => ' ', 'braille' => '  '],
            // Números
            ['caracterEspanol' => '1', 'braille' => '⠁'],
            ['caracterEspanol' => '2', 'braille' => '⠃'],
            ['caracterEspanol' => '3', 'braille' => '⠉'],
            ['caracterEspanol' => '4', 'braille' => '⠙'],
            ['caracterEspanol' => '5', 'braille' => '⠑'],
            ['caracterEspanol' => '6', 'braille' => '⠋'],
            ['caracterEspanol' => '7', 'braille' => '⠛'],
            ['caracterEspanol' => '8', 'braille' => '⠓'],
            ['caracterEspanol' => '9', 'braille' => '⠊'],
            ['caracterEspanol' => '0', 'braille' => '⠚'],
            // Símbolos
            ['caracterEspanol' => '.', 'braille' => '⠲'],
            ['caracterEspanol' => ',', 'braille' => '⠂'],
            ['caracterEspanol' => ';', 'braille' => '⠆'],
            ['caracterEspanol' => ':', 'braille' => '⠒'],
            ['caracterEspanol' => '!', 'braille' => '⠖'],
            ['caracterEspanol' => '?', 'braille' => '⠦'],
            ['caracterEspanol' => '(', 'braille' => '⠶'],
            ['caracterEspanol' => ')', 'braille' => '⠶'],
            ['caracterEspanol' => '-', 'braille' => '⠤'],
            ['caracterEspanol' => '/', 'braille' => '⠌'],
            ['caracterEspanol' => '@', 'braille' => '⠈⠁'],
            ['caracterEspanol' => '#', 'braille' => '⠼'],
            ['caracterEspanol' => '&', 'braille' => '⠯'],
            ['caracterEspanol' => '*', 'braille' => '⠡'],
            ['caracterEspanol' => '"', 'braille' => '⠐⠦'],
            ['caracterEspanol' => "'", 'braille' => '⠄'],
            ['caracterEspanol' => '=', 'braille' => '⠿'],
            ['caracterEspanol' => '+', 'braille' => '⠐⠖'],
            ['caracterEspanol' => '<', 'braille' => '⠐⠶'],
            ['caracterEspanol' => '>', 'braille' => '⠰⠶'],
            ['caracterEspanol' => '$', 'braille' => '⠈⠎'],
            ['caracterEspanol' => '%', 'braille' => '⠨⠴'],
            ['caracterEspanol' => '^', 'braille' => '⠘⠡'],
            ['caracterEspanol' => '_', 'braille' => '⠤'],
            ['caracterEspanol' => '[', 'braille' => '⠨⠶'],
            ['caracterEspanol' => ']', 'braille' => '⠨⠶'],
            ['caracterEspanol' => '{', 'braille' => '⠦⠶'],
            ['caracterEspanol' => '}', 'braille' => '⠶⠦'],
            ['caracterEspanol' => '\\', 'braille' => '⠸⠌'],
            ['caracterEspanol' => '|', 'braille' => '⠸⠶'],
            ['caracterEspanol' => '~', 'braille' => '⠘⠹'],
            ['caracterEspanol' => '`', 'braille' => '⠐'],
            //tildes
            ['caracterEspanol' => 'á', 'braille' => '⠷'],
            ['caracterEspanol' => 'é', 'braille' => '⠮'],
            ['caracterEspanol' => 'í', 'braille' => '⠌'],
            ['caracterEspanol' => 'ó', 'braille' => '⠬'],
            ['caracterEspanol' => 'ú', 'braille' => '⠾'],
            

        ];

        DB::table('translations')->insert($translations);
    }
}
