<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BootcampController;
use App\Http\Controllers\CourseController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('prueba', function(){
    echo "Hola";
});

//Ruta rest para la gestion de estados
//de los bootcamp

Route::apiResource('bootcams', BootcampController::class);
Route::apiResource('course', CourseController::class);


Route::post('courses/{idbootcamp}/create', [CourseController::class, "store"]);
