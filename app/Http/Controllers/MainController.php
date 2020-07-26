<?php

namespace App\Http\Controllers;

use App\Provincia;
use App\Municipio;
use Illuminate\Http\Request;

class Curl
{
    public function getGas()
    {
        $ch = curl_init();
        $url = "https://sedeaplicaciones.minetur.gob.es/ServiciosRESTCarburantes/PreciosCarburantes/PostesMaritimos/";
		curl_setopt($ch,CURLOPT_URL,$url);
		//curl_setopt($ch,CURLOPT_FAILONERROR,true);                                                                    
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"GET");

		$result = curl_exec($ch);
		if(curl_errno($ch)){
			return 'Error:'.curl_error($ch);
		}
		
		curl_close($ch);
		return $result;
    }
}

class MainController extends Controller
{
    public function show(Request $request)
    {
        $curl = new Curl;
        $json = $curl->getGas();
        $result = json_decode($json);
        $result = $result->ListaEESSPrecio;

        $provincia = Provincia::find($request->provincia);
        is_object($provincia) ? $provincia = $provincia->provincia : $provincia = '';
        $municipio = Municipio::find($request->municipio);
        is_object($municipio) ? $municipio = $municipio->nombre : $municipio = '';

        //ORDENAR POR LA OPCIÓN ELEGIDA
        if($request->orden == 'desc'){
            usort($result, function($a, $b) {
                return $a->{'Precio Gasoleo A habitual'} > $b->{'Precio Gasoleo A habitual'} ? -1 : 1;
            }); 
        }
        else if($request->orden == 'asc'){
            usort($result, function($a, $b) {
                return $a->{'Precio Gasoleo A habitual'} < $b->{'Precio Gasoleo A habitual'} ? -1 : 1;
            }); 
        }

        $gasolinerasTable = array();//GUARDARÁ EL RESULTADO FINAL DE GASOLINERAS ENCONTRADAS PARA DATATABLES
        $locations = '';//GUARDARÁ LAS COORDENADAS DE LAS GASOLINERAS PARA EL MAPA
        foreach($result as $gas)
        {
            if(($provincia == '' && $municipio == '') ||
                (($provincia != '' && $gas->Provincia == strtoupper($provincia)) &&
                ($municipio == '' || $gas->Municipio == $municipio)))
            {
                trim($gas->{'Precio Gasoleo A habitual'}) != '' ? $precio = $gas->{'Precio Gasoleo A habitual'} : $precio = 0;
                $gasolinerasTable[] = array($gas->Provincia, $gas->Municipio, $precio.'€', $gas->Dirección);
                $locations .= $gas->Dirección.'.<br>'.$gas->Provincia.', '.$gas->Municipio.', C.P. '.$gas->{'C.P.'}.'.<br><strong style=\'color:red;\'>Precio: '.$precio.'€.</strong>|'.str_replace(',','.',$gas->Latitud).'|'.str_replace(',','.',$gas->{'Longitud (WGS84)'}).'^';
            }
        }
        $locations = substr($locations, 0, -1);

        return response()->json(['provincia'=>$provincia, 'municipio'=>$municipio, 'table'=>$gasolinerasTable, 'locations'=>$locations]);
    }
}
