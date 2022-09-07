<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    /*
    -Response existosas
    */
    public function sendResponse($data , $http_Status = 200){
        //1. Construir la respuesta 
        $respuesta = ["success" => true, "data" => $data];
        //2. Enviar response afirmativa al cliente
        return response()->json( $respuesta, $http_Status);
    }

    /*
    -Response fallidas
    */
    public function sendError($errors, $http_Status=404 ){
        //1. Contruir la respuesta de error
        $respuesta = ["success" => false, "errors" => $errors];
        //2. Enviar la response de error
        return response()->json($respuesta, $http_Status);
    }

}
