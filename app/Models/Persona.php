<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Persona",
 *     required={"nombre", "apellido", "email"},
 *     @OA\Property(property="id", type="integer", format="int64", readOnly=true),
 *     @OA\Property(property="nombre", type="string", example="Juan"),
 *     @OA\Property(property="apellido", type="string", example="Pérez"),
 *     @OA\Property(property="email", type="string", format="email", example="juan@ejemplo.com"),
 *     @OA\Property(property="telefono", type="string", example="555-1234"),
 *     @OA\Property(property="created_at", type="string", format="date-time", readOnly=true),
 *     @OA\Property(property="updated_at", type="string", format="date-time", readOnly=true)
 * )
 */
class Persona extends Model
{
    //
    protected $table = 'persona';

    protected $fillable = [
      'identificacion',
      'nombre',
      'apellido',
      'email',
      'telefono',
      'direccion'  
    ];
}