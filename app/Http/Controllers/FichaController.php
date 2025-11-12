<?php

namespace App\Http\Controllers;

use App\Models\Ficha;
use Illuminate\Http\Request;

class FichaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Obtener todas las aseguradoras ordenadas por nombre
        $ficha = Ficha::all();

        //Retornar la vista con los datos
        return view('Ficha.index', compact('ficha'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Ficha.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validar los datos del formulario
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
        try{
            Ficha::create($validatedData);

            return redirect()
                ->route('Ficha.index')
                ->with('succes','Ficha creada exitosamente');
                
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error al crear la ficha: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($no_recibo)
    {
        $ficha = Ficha::findOrFail ($no_recibo);
        return view('Ficha.show', compact('ficha'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($no_recibo)
    {
        $ficha = Ficha::findOrFail ($no_recibo);
        return view('Ficha.edit', compact('ficha'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $no_recibo)
    {
        $ficha = Ficha::findOrFail ($no_recibo);
        //Validar los datos (no_recibo no se puede modificar)
        $validatedData = $request->validate([
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
        ], [
            'fecha_pago.required'=> 'Introduzca su fecha de pago',
            'fecha_registro.required'=> 'La fecha de registro es necesario',
            'instituto.required'=> 'Se requiere el instituto',
            'apellido_paterno.required'=> 'Introduzca su apellido paterno',
            'apellido_materno.required'=> 'Introduzca su apellido materno',
            'nombre_aspirante.required'=> 'Introduzca su nombre',
            'nip.required'=> 'Introduzca su nip',
            'fecha_nacimiento.required'=> 'Introduzca su fecha de nacimiento',
            'sexo.required'=> 'Masculino,Femenino u Otros',
            'nacionalidad.required'=> 'Inroduzca su nacionalidad',
            'especifique_extranjero.required'=> 'Requiere su nacionalidad',
            'curp.required'=> 'Introduzca su curp',
            'carrera_opcion_1.required'=> 'Introcuzca su primera opcion de carrera',
            'carrera_opcion_2.required'=> 'Introcuzca su segunda opcion de carrera',
            'entidad_federativa_prepa.required'=> 'Introduzca su entidad federativa de prepa',
        ]);

      try  {
        // Actualizar la aseguradora
        $ficha->update($validatedData);

        return redirect ()
        ->route('Ficha.index')
        ->with('success', 'Ficha actualizada exitosamente');

        } catch (\Exception $e){

            return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Error al actualizar la ficha: ' . $e->getMessage());

        }

    }

    /**
     * Remove the specified resource from storage.
     * Función DELETE - Eliminar ficha
     */
    public function destroy($no_recibo)
    {
        try {
        $ficha = Ficha::FindOrFail($no_recibo);
         $fecha_pago = $ficha->fecha_pago;
         
         $ficha->delete();

         return redirect()
         ->route('Ficha.index')
         ->with('success', "La ficha '$fecha_pago' fue eliminada exitosamente");

        } catch (\Exception $e) {
            return redirect()
            ->route('Ficha.index')
            ->with('error', 'Error al eliminar la ficha: ' . $e->getMessage());
        }
    }
}
