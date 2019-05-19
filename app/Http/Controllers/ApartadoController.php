<?php

namespace App\Http\Controllers;
use App\Apartado;
use App\Cliente;
use App\Empleado;
use Illuminate\Http\Request;

class ApartadoController extends Controller {
    public function index()
    {
        $apartados = Apartado::all();
        $title = "Tabla de Apartados";
        return view('apartados')
            ->with('apartados', $apartados)
            ->with('title', $title);
    }
    public function eliminar($apartado_id)
    {
        if ($apartado_id) {
            try {
                if(Apartado::destroy($apartado_id)){
                    return response()->json(['mensaje' => 'apartado eliminado', 'status' => 'ok'], 200);
                }else{
                    return response()->json(['mensaje' => 'El apartado no se pudo eliminar', 'status' => 'error'], 400);
                }
            } catch (Exception $e) {
                return response()->json(['mensaje' => 'Error al eliminar el apartado'], 400);
            }
        }else{
            return response()->json(['mensaje' => 'Error al eliminar el apartado, apartado no encontrado '], 400);
        }

    }

    public function nuevo()
    {
        $title = "Nuevo Apartado";
        $clientes = Cliente::all();
        $empleados = Empleado::all();
        return view('apartadosNuevo')
            ->with('title', $title)
            ->with('clientes', $clientes)
            ->with('empleados', $empleados);

    }

    public function guardar(Request $request)
    {
        try {
            $apartado = new Apartado();
            $apartado->clientes_id = $request->cliente;
            $apartado->fecha_inicio = $request->fecha_inicio;
            $apartado->fecha_fin = $request->fecha_fin;
            $apartado->anticipo = $request->anticipo;
            $apartado->total = $request->total;
            $apartado->empleados_id = $request->empleado;
            if($apartado->save()){
                return response()->json(['mensaje' => 'Apartado agregado', 'status' => 'ok'], 200);
            }else{
                return response()->json(['mensaje' => 'Error al agregar el apartado', 'status' => 'error'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['mensaje' => 'Error al agregar el apartado'], 403);
        }
    }
}