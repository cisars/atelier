<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ParaBusquedaController extends Controller
{
    public function index(Request $request)
        {

            $clients = [];
            if ($request->q) {
                $clients_data =
                $clients = Cliente::Search($request->q)->paginate(100);
                foreach ($clients_data as $client) {
                    $clients[] = [
                        'id' => $client->id,
                        'resultado' => $client->id. ' | ' . $client->razon_social,
                    ];
                }
            }

            //TYPEAHEAD
            /*$clients = User::whereHas('roles', function ($q) {
                $q->where('name', 'cliente');
            })->where('name', 'ilike', '%' . $request->q . '%')->get();*/

            return response()->json($clients);
        }
}
