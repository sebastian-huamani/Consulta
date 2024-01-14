<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Peru\Http\ContextClient;
use Peru\Sunat\UserValidator;

class UsuarioSolController extends Controller
{
    public function consulta()
    {
        try {

            $ruc = '20123456789'; // colocar un ruc válido
            $user = 'TGGMMSYY'; // colocar un usuario según el ruc

            $cs = new UserValidator(new ContextClient());
            $valid = $cs->valid($ruc, $user);
            if ($valid) {
                echo 'Válido';
            } else {
                echo 'Inválido';
            }
        } catch (\Exception $e) {
            return response()->json([
                'data' => $e->getMessage()
            ], 404) ;
        }
    }
}
