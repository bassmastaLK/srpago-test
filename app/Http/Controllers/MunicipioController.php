<?php

namespace App\Http\Controllers;

use App\Municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    public function getMunicipios(Request $request)
    {
        $municipios = Municipio::where('id_provincia', $request->id)->orderBy('nombre', 'asc')->get();
        $texto = '[{"id": "0", "text": ""},';
        foreach($municipios as $municipio){
            $texto .= '{"id": "'.$municipio->id_municipio.'", "text": "'.$municipio->nombre.'"},';
        }
        $texto = substr($texto, 0, -1);
        $texto .= ']';
        
        return json_decode($texto);
    }
}
