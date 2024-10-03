<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EtiquetaResource;
use Illuminate\Http\Request;
use App\Models\Etiqueta;
use App\Http\Resources\CategoriaResource;

class EtiquetaController extends Controller
{
    public function index(){
        return EtiquetaResource::collection(Etiqueta::with('recetas.categoria','recetas.etiquetas', 'recetas.user')->get());
    }

    public function show(Etiqueta $etiqueta){
        return new EtiquetaResource($etiqueta->load('recetas'));
    }
    //
}
