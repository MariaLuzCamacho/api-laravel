<?php

namespace App\Http\Controllers;

use App\Models\Persona;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator; // Paquete para Validar

class personaController extends Controller
{
    //
    public function index(){

        $personas = Persona::all();
        if ($personas->isEmpty()) {
                $data = [
                    'message' => 'No se encontraron personas',
                    'status' => 200
                ];
                return response()->json($data, 404);
            }
        
        return response()->json($personas, 200);
    }

    public function guardar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'identificacion' => 'required|max:20',
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'email' => 'required|email',
            'telefono' => 'required|max:13',
            'direccion' => 'required|max:255'
        ]);
        // si hay error de validación        
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        // Si pasa la validación 
        $persona = Persona::create([
            'identificacion' => $request->identificacion,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion
        ]);

        // Si hay error se envia un mensaje y regresa un mensaje status 500
        if (!$persona) {
            $data = [
                'message' => 'Error al crear el persona',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
        // si se puede crear se envia un mensaje status 201
        $data = [
            'persona' => $persona,
            'status' => 201
        ];
        return response()->json($data, 201);
    }   
    
    public function consultarId($id)
    {
        $persona = Persona::find($id);

        if (!$persona) {
            $data = [
                'message' => 'Persona no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'persona' => $persona,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    // Método para eliminar una persona

    public function eliminar($id)
    {
        $persona = Persona::find($id);

        if (!$persona) {
            $data = [
                'message' => 'Persona no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        
        $persona->delete();

        $data = [
            'message' => 'Persona eliminada',
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    // Actualizar con PUT

    public function actualizar(Request $request, $id)
    {
        $persona = Persona::find($id);
        if (!$persona) {
            $data = [
                'message' => 'Persona no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'identificacion' => 'required|max:20',
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'email' => 'required|email',
            'telefono' => 'required|max:13',
            'direccion' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $persona->identificacion = $request->identificacion;
        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->email = $request->email;
        $persona->telefono = $request->telefono;
        $persona->direccion = $request->direccion;          

        $persona->save();
        $data = [
            'message' => 'Datos actualizados de Persona',
            'persona' => $persona,
            'status' => 200
        ];
        return response()->json($data, 200);
    }
        

    public function actualizarParcial(Request $request, $id)
    {
        $persona = Persona::find($id);
        if (!$persona) {
            $data = [
                'message' => 'Persona no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $validator = Validator::make($request->all(), [
            'identificacion' => 'max:20',
            'nombre' => 'max:255',
            'apellido' => 'max:255',
            'email' => 'email',
            'telefono' => 'max:13',
            'direccion' => 'max:255'
        ]);
        
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        if ($request->has('identificacion')) {
            $persona->identificacion = $request->identificacion;
        }
        if ($request->has('nombre')) {
            $persona->nombre = $request->nombre;
        }

        if ($request->has('apellido')) {
            $persona->apellido = $request->apellido;
        }
        if ($request->has('email')) {
            $persona->email = $request->email;
        }

        if ($request->has('telefono')) {
            $persona->telefono = $request->telefono;
        }

        if ($request->has('direccion')) {
            $persona->direccion = $request->direccion;
        }

        $persona->save();

        $data = [
            'message' => 'Persona actualizada',
            'persona' => $persona,
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}