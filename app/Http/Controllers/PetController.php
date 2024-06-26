<?php

namespace App\Http\Controllers;

use App\Models\Models\Pet;
use Illuminate\Http\Request;
use App\Http\Requests\StorePetRequest;

class PetController extends Controller
{
    // Método para obtener una mascota por su ID
    public function get($id)
    {
        $pet = Pet::find($id);

        if (!$pet) {
            return response()->json(['message' => 'Pet not found'], 404);
        }

        return response()->json($pet, 200);
    }

    // Método para actualizar una mascota
    public function update(Request $request, $id)
    {
        // Validar los datos del request
        $request->validate([
            'name' => 'string',
            'breed' => 'string',
            'description' => 'string',
            'age' => 'integer',
        ]);

        $pet = Pet::find($id);

        if (!$pet) {
            return response()->json(['message' => 'Pet not found'], 404);
        }

        // Actualizar los datos de la mascota
        $pet->update($request->only(['name', 'breed', 'description', 'age']));

        return response()->json(['message' => 'Pet updated successfully'], 200);
    }

    // Método para reemplazar una mascota
    public function put(Request $request, $id)
    {
        // Validar los datos del request
        $request->validate([
            'name' => 'required|string',
            'breed' => 'required|string',
            'description' => 'required|string',
            'age' => 'required|integer',
        ]);

        $pet = Pet::find($id);

        if (!$pet) {
            return response()->json(['message' => 'Pet not found'], 404);
        }

        // Reemplazar los datos de la mascota
        $pet->update([
            'name' => $request->input('name'),
            'breed' => $request->input('breed'),
            'description' => $request->input('description'),
            'age' => $request->input('age'),
        ]);

        return response()->json(['message' => 'Pet replaced successfully'], 200);
    }

    // Método para eliminar una mascota
    public function delete($id)
    {
        $pet = Pet::find($id);

        if (!$pet) {
            return response()->json(['message' => 'Pet not found'], 404);
        }

        $pet->delete();

        return response()->json(['message' => 'Pet deleted successfully'], 200);
    }

    // Método para crear una nueva mascota
    public function create(StorePetRequest $request)
    {
        // Validar los datos del request
        $request->validate([
            'name' => 'required|string',
            'breed' => 'required|string',
            'description' => 'required|string',
            'age' => 'required|integer',
        ]);

        // Crear una nueva mascota
        $pet = Pet::create([
            'name' => $request->input('name'),
            'breed' => $request->input('breed'),
            'description' => $request->input('description'),
            'age' => $request->input('age'),
        ]);

        // Retornar una respuesta
        return response()->json(['message' => 'Pet created successfully'], 201);
    }
}
