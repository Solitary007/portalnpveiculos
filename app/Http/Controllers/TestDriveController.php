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
    public function create() : Response
    {
        return Inertia::render('portalnpveiculos/exemplo/ExemploForm');
    }

    public function store(Request $request) : RedirectResponse
    {


        /*$request->validate([
           'placa' => 'required|string|max:255',
           'responsavel' => 'required|string|max:255',
        ]);*/

        $testDrive = TestDrive::create([
            'placa' => $request->placa,
            'responsavel' => $request->responsavel,
        ]);
        event(new Registered($testDrive));

        return to_route('dashboard');

    }


}
