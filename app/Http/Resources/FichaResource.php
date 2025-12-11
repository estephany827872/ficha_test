<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FichaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array

    {
        return [
            'no_recibo' => $this->no_recibo,
            'fecha_pago' => $this->fecha_pago->format('Y-m-d'),
            'fecha_registro' => $this->fecha_registro->format('Y-m-d'),
            'instituto' => $this->instituto,
            'apellido_paterno' => $this->apellido_paterno,
            'apellido_materno' => $this->apellido_materno,
            'nombre_aspirante' => $this->nombre_aspirante,
            'nip' => $this->nip,
            'fecha_nacimiento' => $this->fecha_nacimiento->format('Y-m-d'),
            'nacionalidad' => $this->nacionalidad, 
            'especifique_extranjero' => $this->especifique_extranjero,
            'carrera_opcion_1' => $this->carrera_opcion_1,
            'carrera_opcion_2' => $this->carrera_opcion_2,
            'entidad_federativa_prepa' => $this->entidad_federativa_prepa,
    
        ];
    }
}


