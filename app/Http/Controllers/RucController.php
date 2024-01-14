<?php

namespace App\Http\Controllers;

use Peru\Sunat\RucFactory;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RucController extends Controller
{
    public function consulta(int $ruc)
    {
        try {
            $factory = new RucFactory();
            $cs = $factory->create();
    
            $company = $cs->get($ruc);
            if (!$company) {
                return response()->json(['msg' => 'error en consulta'], 400);
            }
    
            return response()->json([
                'data' => $company
            ], 200) ;
        } catch (\Exception $e) {
            return response()->json([
                'data' => $e->getMessage()
            ], 404) ;
        }
    }
}
