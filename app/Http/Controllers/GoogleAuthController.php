<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();
        $email = $googleUser->getEmail();
        $nombreCompleto = $googleUser->getName();

        /* Verifica que el correo tenga el dominio correcto
        if (!str_ends_with($email, '@kombitec.com.mx')) {
            return redirect('/login')->with('error', 'Solo se permiten cuentas del dominio kombitec.com.mx');
        }*/

        $datosSeparados = $this->separarNombreCompleto($nombreCompleto);

        $user = User::firstOrCreate(
            ['email' => $email],
            [
                'nombre' => $datosSeparados['nombre'],
                'apellido_paterno' => $datosSeparados['apellido_paterno'],
                'apellido_materno' => $datosSeparados['apellido_materno'],
                'password' => bcrypt(env('TEMP_PASSWORD', 'temporal1234')),
            ]
        );

        Auth::login($user);

        // Si no ha verificado su correo, enviar verificación y redirigir
        if (!$user->hasVerifiedEmail()) {
            event(new Registered($user)); // manda el correo
            return redirect()->route('verification.notice');
        }


        return redirect()->route('dashboard');
    }

    private function separarNombreCompleto($nombreCompleto)
    {
        $partes = explode(' ', trim($nombreCompleto));
        $cantidad = count($partes);

        $nombre = '';
        $apellido_paterno = '';
        $apellido_materno = '';

        if ($cantidad === 4) {
            $nombre = $partes[0] . ' ' . $partes[1];
            $apellido_paterno = $partes[2];
            $apellido_materno = $partes[3];
        } elseif ($cantidad === 3) {
            $nombre = $partes[0];
            $apellido_paterno = $partes[1];
            $apellido_materno = $partes[2];
        } elseif ($cantidad === 2) {
            $nombre = $partes[0];
            $apellido_paterno = $partes[1];
        } else {
            $nombre = $nombreCompleto;
        }

        return [
            'nombre' => $nombre,
            'apellido_paterno' => $apellido_paterno,
            'apellido_materno' => $apellido_materno,
        ];
    }
}
