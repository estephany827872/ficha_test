<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ficha;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class FichasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $ficha = Ficha::all();
        return response()->json($ficha);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_recibo' => 'required|integer|unique:fichas,no_recibo',
            'fecha_pago'=> '|date',
            'fecha_registro'=> '|date',
            'instituto'=> '|string|max:50',
            'apellido_paterno'=> '|string|max:100',
            'apellido_materno'=> '|string|max:100',
            'nombre_aspirante'=> '|string|max:100',
            'nip'=> '|numeric',
            'fecha_nacimiento'=> '|date',
            'sexo'=> '|string|max:20',
            'nacionalidad'=> '|string|max:50',
            'especifique_extranjero'=> '|string|max:20',
            'curp'=> '|string|max:18',
            'carrera_opcion_1'=> '|string|max:50',
            'carrera_opcion_2'=> '|string|max:50',
            'entidad_federativa_prepa'=> '|string|max:50',
        ],[
            'no_recibo' => 'Introduzca el numero de recibo',
            'fecha_pago'=> 'Introduzca su fecha de pago',
            'fecha_registro'=> 'La fecha de registro es necesario',
            'instituto'=> 'Se requiere el instituto',
            'apellido_paterno'=> 'Introduzca su apellido paterno',
            'apellido_materno'=> 'Introduzca su apellido materno',
            'nombre_aspirante'=> 'Introduzca su nombre',
            'nip'=> 'Introduzca su nip',
            'fecha_nacimiento'=> 'Introduzca su fecha de nacimiento',
            'sexo'=> 'Masculino,Femenino u Otros',
            'nacionalidad'=> 'Inroduzca su nacionalidad',
            'especifique_extranjero'=> 'Requiere su nacionalidad',
            'curp'=> 'Introduzca su curp',
            'carrera_opcion_1'=> 'Introcuzca su primera opcion de carrera',
            'carrera_opcion_2'=> 'Introcuzca su segunda opcion de carrera',
            'entidad_federativa_prepa'=> 'Introduzca su entidad federativa de prepa',
        ]);

        $ficha = Ficha::create($request->all());
        return response()->json($ficha, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $no_recibo): JsonResponse
    {
        try {
            $ficha = Ficha::findOrFail($no_recibo);
            return response()->json($ficha);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Ficha no encontrada'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $no_recibo):JsonResponse
    {
         $request->validate([
            'fecha_pago'=> 'required|date',
            'fecha_registro'=> 'required|date',
            'instituto'=> 'required|string|max:50',
            'apellido_paterno'=> 'required|string|max:100',
            'apellido_materno'=> 'required|string|max:100',
            'nombre_aspirante'=> 'required|string|max:100',
            'nip'=> 'required|integer',
            'fecha_nacimiento'=> 'required|date',
            'sexo'=> 'required|string|max:20',
            'nacionalidad'=> 'required|string|max:50',
            'especifique_extranjero'=> 'required|string|max:20',
            'curp'=> 'required|string|max:18',
            'carrera_opcion_1'=> 'required|string|max:50',
            'carrera_opcion_2'=> 'required|string|max:50',
            'entidad_federativa_prepa'=> 'required|string|max:50',
        ]);

        $ficha = Ficha::findOrFail($no_recibo);
        $ficha->update($request->all());
        return response()->json($ficha);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $no_recibo): JsonResponse
    {
        Ficha::findOrFail($no_recibo)->delete();
        return response()->json(null, 204);
    }
}
