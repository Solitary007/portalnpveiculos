<?php

namespace App\Http\Controllers;

use App\Models\TestDrive;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class TestDriveController extends Controller
{
    public function store(Request $request)
    {
        $registro = TestDrive::create([
            'nome' => $request->nome,
            'veiculo' => $request->modelo,
            'obs' => $request->observacoes,
            'saida' => now(),
            'status' => 'red',
        ]);
        return response()->json($registro, 201);
    }

    public function index()
    {
        return TestDrive::orderBy('id', 'desc')->get();
    }

    public function entrada($id)
    {
        $registro = TestDrive::findOrFail($id);
        $registro->entrada = now();
        $registro->status = 'green';
        $registro->save();
        return response()->json($registro);
    }
}
