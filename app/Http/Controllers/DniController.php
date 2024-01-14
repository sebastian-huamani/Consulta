<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Peru\Jne\DniFactory;

class DniController extends Controller
{
    public function consulta(int $dni)
    {
        try {
            $factory = new DniFactory();
            $cs = $factory->create();
    
            $person = $cs->get($dni);
            if (!$person) {
                return response()->json(['msg' => 'error en consulta'], 400);
            }
    
            return response()->json([
                'data' => $person
            ], 200) ;
        } catch (\Exception $e) {
            return response()->json([
                'data' => $e->getMessage()
            ], 404) ;
        }
    }
}
