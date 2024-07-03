<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    
    public function verificarPago(Request $request)
    {
        $dni = $request->input('dni');
        $alumno = Alumno::where('dni', $dni)->first();
    
        if (!$alumno) {
            return view('verificar_pago', ['result' => null]);
        }
    
        $altas = $alumno->altas()->with('curso')->get();
    
        $result = [
            'alumno' => $alumno,
            'altas' => $altas->map(function ($alta) {
                return [
                    'curso' => $alta->curso->nombre,
                    'pago_al_dia' => $alta->pago_al_dia ? 'Sí' : 'No'
                ];
            }),
        ];
    
        return view('verificar_pago', ['result' => $result]);
    }

    
}