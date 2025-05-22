<?php
namespace App\Http\Controllers;

use App\Models\Estoque;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller; // Adicione esta linha se necessário


class EstoqueController extends Controller
{
    public function index()
    {
        return Estoque::all();
    }

    public function store(Request $request)
    {
        $estoque = Estoque::create($request->all());
        return response()->json($estoque, 201);
    }

    public function update(Request $request, $id)
    {
        $estoque = Estoque::findOrFail($id);
        $estoque->update($request->all());
        return response()->json($estoque);
    }
}