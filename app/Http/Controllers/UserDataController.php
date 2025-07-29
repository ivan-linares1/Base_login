<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDataController extends Controller
{
    public function updateMissingData(Request $request)
    {
        $request->validate([
            'numero_empleado'  => 'required|integer',
            'puesto'           => 'nullable|string|max:255',
            'departamento'     => 'nullable|string|max:255',
            'telefono'         => 'nullable|string|max:10',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        $user->update($request->only([
            'numero_empleado',
            'puesto',
            'departamento',
            'telefono'
        ]));

        return redirect()->route('dashboard')->with('success', 'Datos actualizados correctamente.');
    }
}
