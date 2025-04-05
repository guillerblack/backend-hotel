<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::all();
        return response()->json(['reservas' => $reservas]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cliente' => 'required|string|max:255',
            'habitacion' => 'required|string|max:255',
            'fecha_entrada' => 'required|date',
            'fecha_salida' => 'required|date|after_or_equal:fecha_entrada',
        ]);

        $reserva = Reserva::create($validated);

        return response()->json(['message' => 'Reserva creada con éxito', 'reserva' => $reserva], 201);
    }

    public function show($id)
    {
        $reserva = Reserva::findOrFail($id);
        return response()->json(['reserva' => $reserva]);
    }

    public function update(Request $request, $id)
    {
        $reserva = Reserva::findOrFail($id);

        $validated = $request->validate([
            'cliente' => 'required|string|max:255',
            'habitacion' => 'required|string|max:255',
            'fecha_entrada' => 'required|date',
            'fecha_salida' => 'required|date|after_or_equal:fecha_entrada',
        ]);

        $reserva->update($validated);

        return response()->json(['message' => 'Reserva actualizada con éxito', 'reserva' => $reserva]);
    }

    public function destroy($id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->delete();

        return response()->json(['message' => 'Reserva eliminada con éxito']);
    }
}
