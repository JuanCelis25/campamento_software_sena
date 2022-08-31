<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bootcamp;
use App\Http\Requests\StoreBootcampRequest;
use App\Http\Resources\BootcampResource;
use App\Http\Resources\BootcampCollection;


class BootcampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //json es un obejto que trae los metodos response
        //parametros: 1. data a enviar al client
                    //2. codigo status http
                    
     return response()->json( new BootcampCollection(Bootcamp::all()) ,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBootcampRequest $request)
    {
       //1. reglas de validacion
       
       //2. Crear el validador
       
       //3. Validar 
      
        return response()->json([ "success" => true, "data" => new BootcampResource(Bootcamp::create($request->all()))] , 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json([ "success" => true, "data" => new BootcampResource(Bootcamp::find($id))] ,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Localizar el bootcamp con id
        $b = bootcamp::find($id);
        //actualizarlo con update
        $b->update($request->all());
        return response()->json(["success" => true, "data" => new BootcampResource($b)], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
   
         $a = bootcamp::find($id);
   
         $a->delete();
         return response()->json(["success" => true, "data" => new BootcampResource($a)], 200);
    }
}
