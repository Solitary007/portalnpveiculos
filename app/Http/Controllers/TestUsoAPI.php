<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Http;

class TestUsoAPI extends Controller
{

    public function index() {
        try {
            $response = Http::get('https://brasilapi.com.br/api/fipe/marcas/v1/carros');

            if ($response->successful()) {
                $dadosMarca = $response->json();

                foreach ($dadosMarca as $marca) {
                    echo "<br>";
                    echo "Nome: " . $marca['nome'] . "<br>";
                    echo "Valor: " . $marca['valor'] . "<br>";
                }

                return "API Acessada com Sucesso!";
            } else {
                $statusCode = $response->status();
                return "Erro ao acessar a API. Status: {$statusCode} - Detalhes: " . $response->body();
            }
        } catch (\Exception $e) {
            return "Ocorreu um erro na requisição: " . $e->getMessage();
        }
    }
}
