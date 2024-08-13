<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RandomUserController extends Controller
{
    public function getRandomUsers()
    {
        $response = Http::get('https://randomuser.me/api/?results=5');
        
        $data = $response->json();
        
        //Extrae los nombres completos
        $names = collect($data['results'])->map(function ($user) {
            return "{$user['name']['first']} {$user['name']['last']}";
        });

        //Combina todos los nombres en una sola cadena
        $allNames = implode(' ', $names->toArray());

        $allNames = strtolower($allNames); //Convierte a minúsculas
        $allNames = preg_replace('/[^a-zñáéíóúü]/u', '', $allNames); //Elimina caracteres no alfabéticos

        //Cuenta cada letra
        $letterCounts = array_count_values(str_split($allNames));

        //Encuentra la letra más común
        arsort($letterCounts);
        $mostCommonLetter = array_key_first($letterCounts);

        return response()->json([
            'names' => $names,
            'most_common_letter' => $mostCommonLetter,
            'letter_count' => $letterCounts,
        ]);
    }
}
