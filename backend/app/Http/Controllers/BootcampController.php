<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bootcamp;
use App\Http\Requests\StoreBootcampRequest;
use App\Http\Resources\BootcampResource;
use App\Http\Resources\BootcampCollection;
use App\Http\Controllers\BaseController;


class BootcampController extends BaseController
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
         try{
            return $this->sendResponse(new BootcampCollection(Bootcamp::all()));
         }catch(\Exception $e){
            return $this->sendError('Serve Error' ,500);
         } 

                    


    /* return response()->json( new BootcampCollection(Bootcamp::all()) ,200);*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBootcampRequest $request)
    {
        try {
            return $this->sendResponse(new BootcampResource(Bootcamp::create($request->all())) , 201);
    }
        catch (\Exception $th) {
            return $this->sendError('Server Error' , 500);
        }
       //1. reglas de validacion
       
       //2. Crear el validador
       
       //3. Validar 
      
       /* return response()->json([ "success" => true, "data" => new BootcampResource(Bootcamp::create($request->all()))] , 201);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        try{
           //1. Encontrar el bootcamp por id
        $bootcamp = Bootcamp::find($id);
        //2. en caso de que el bootcamp
        // no exista
        if(!$bootcamp){
            return $this->sendError("bootcamp with id:$id not found", 400);
        }
        return $this->sendResponse(new BootcampResource($bootcamp)); 
        }catch(\Exception $e){
            return $this->sendError('Serve Error' ,500) ;
        }


        /*return response()->json([ "success" => true, "data" => new BootcampResource(Bootcamp::find($id))] ,200);*/
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
        try {
            //Localizar el bootcamp con id
        $b = bootcamp::find($id);
        if(!$b){
            return $this->sendError("bootcamp with id:$id not found", 400);
        }
        //actualizarlo con update
        $b->update($request->all());
        return $this->sendResponse(new BootcampResource($b));
        } catch (\Exception $th) {
            return $this->sendError('Serve Error' ,500);
        }

        /*
        //Localizar el bootcamp con id
        $b = bootcamp::find($id);
        if(!$b){
            return $this->sendError("bootcamp with id:$id not found", 400);
        }
        //actualizarlo con update
        $b->update($request->all());
        return $this->sendResponse(new BootcampResource($b));*/
        
        //actualizarlo con update
        /*$b->update($request->all());
        return response()->json(["success" => true, "data" => new BootcampResource($b)], 200);*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $a = bootcamp::find($id);
         if(!$a){
            return $this->sendError("bootcamp with id:$id not found", 400);
        }
        //eliminar
        $a->delete();
        return $this->sendResponse(new BootcampResource($a));
        } catch (\Throwable $th) {
            return $this->sendError('Serve Error' ,500);
        }

        /* 
         $a = bootcamp::find($id);
         if(!$a){
            return $this->sendError("bootcamp with id:$id not found", 400);
        }
        //eliminar
        $a->delete();
        return $this->sendResponse(new BootcampResource($a));*/

        /* $a->delete();
         return response()->json(["success" => true, "data" => new BootcampResource($a)], 200);*/
    }
}
