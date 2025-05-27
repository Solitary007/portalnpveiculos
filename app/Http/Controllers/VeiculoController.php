<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veiculo;

class VeiculoController extends Controller
{
    public function index()
    {
        // return 'index';
        $veiculo = Veiculo::all();
        return dd($veiculo);
    }
}
