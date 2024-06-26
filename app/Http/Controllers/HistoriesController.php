<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateHistoriesRequest;
use App\Models\Models\Histories;
use Illuminate\Http\Request;

class HistoriesController extends Controller
{
    // Método para obtener una historia por su ID
    public function get($id)
    {
        $histories = Histories::find($id);

        if (!$histories) {
            return response()->json(['message' => 'Histories not found'], 404);
        }

        return response()->json($histories, 200);
    }

    // Método para actualizar una historia
    public function update(UpdateHistoriesRequest $request, $id)
    {
        $histories = Histories::find($id);

        if (!$histories) {
            return response()->json(['message' => 'Histories not found'], 404);
        }

        // Actualizar los datos de la historia
        $histories->update($request->validated());

        return response()->json(['message' => 'Histories updated successfully'], 200);
    }

    // Método para reemplazar una historia
    public function put(Request $request, $id)
    {
        // Validar los datos del request
        $request->validate([
            'pet_id' => 'required|integer|exists:pets,id',
            'event_date' => 'required|date',
            'description' => 'required|string',
        ]);

        $histories = Histories::find($id);

        if (!$histories) {
            return response()->json(['message' => 'Histories not found'], 404);
        }

        // Reemplazar los datos de la historia
        $histories->update([
            'pet_id' => $request->input('pet_id'),
            'event_date' => $request->input('event_date'),
            'description' => $request->input('description'),
        ]);

        return response()->json(['message' => 'Histories replaced successfully'], 200);
    }

    // Método para eliminar una historia
    public function delete($id)
    {
        $histories = Histories::find($id);

        if (!$histories) {
            return response()->json(['message' => 'Histories not found'], 404);
        }

        $histories->delete();

        return response()->json(['message' => 'Histories deleted successfully'], 200);
    }
}
//HOLA :)