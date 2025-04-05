<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitacion;

class HabitacionController extends Controller
{
    public function index()
    {
        return response()->json(Habitacion::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'numero' => 'required|string|max:10',
            'tipo' => 'required|string|max:255',
            'precio' => 'required|numeric',
        ]);

        $habitacion = Habitacion::create($validated);

        return response()->json(['message' => 'Habitación creada con éxito', 'habitacion' => $habitacion], 201);
    }

    public function show($id)
    {
        $habitacion = Habitacion::findOrFail($id);
        return response()->json($habitacion);
    }

    public function update(Request $request, $id)
    {
        $habitacion = Habitacion::findOrFail($id);

        $validated = $request->validate([
            'numero' => 'required|string|max:10',
            'tipo' => 'required|string|max:255',
            'precio' => 'required|numeric',
        ]);

        $habitacion->update($validated);

        return response()->json(['message' => 'Habitación actualizada con éxito', 'habitacion' => $habitacion]);
    }

    public function destroy($id)
    {
        $habitacion = Habitacion::findOrFail($id);
        $habitacion->delete();

        return response()->json(['message' => 'Habitación eliminada con éxito']);
    }
}
