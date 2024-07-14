<?php

// app/Http/Controllers/ContactoController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactoMailable;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function showForm()
    {
        return view('contacto.form');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mensaje' => 'required|string|max:2000',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'email.required' => 'El campo email es obligatorio.',
            'mensaje.required' => 'El campo mensaje es obligatorio.',
        ]);

        $correo = new ContactoMailable($request->all());
        Mail::to('destino@example.com')->send($correo);

        return redirect()->route('contacto.form')->with('success', 'Mensaje enviado correctamente.');
    }
}
