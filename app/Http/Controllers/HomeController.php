<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Models\Material;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tempList = session()->get('tempList', []);
    $tempListIds = array_column($tempList, 'id');

        $materiales = Material::all();
        return view('home', compact('materiales', 'tempListIds'));


        //return view('home');
    }

    // Manejo de lista

    public function addToTempList(Request $request, $materialId)
    {
        $material = Material::find($materialId);

        if (!$material) {
            return redirect()->back()->with('error', 'Material no encontrado.');
        }

        $tempList = $request->session()->get('tempList', []);
        $totalPrice = $request->session()->get('totalPrice', 0);

        // Agregar el material a la lista temporal
        $tempList[] = $material;

        // Actualizar el total sumando el precio del material agregado
        $totalPrice += $material->precio_referencial;

        $request->session()->put('tempList', $tempList);
        $request->session()->put('totalPrice', $totalPrice);

        return redirect()->back()->with('success', 'Material agregado a la lista temporal.');
    }

    public function viewTempList(Request $request)
    {
        $empresas = Empresa::all();
        $tempList = $request->session()->get('tempList', []);

        return view('temp_list', compact('tempList', 'empresas'));
    }

    public function removeFromTempList(Request $request, $materialId)
    {
        $tempList = $request->session()->get('tempList', []);

        foreach ($tempList as $key => $material) {
            if ($material->id == $materialId) {
                // Eliminar el material de la lista temporal
                $materialPrice = $tempList[$key]->precio_referencial;
                unset($tempList[$key]);
                $request->session()->put('tempList', array_values($tempList));

                // Obtener el valor actual de $totalPrice desde la sesión
                $totalPrice = $request->session()->get('totalPrice', 0);

                // Actualizar el total restando el precio del material eliminado
                $totalPrice -= $materialPrice;
                $request->session()->put('totalPrice', $totalPrice);

                break;
            }
        }



        return redirect()->back()->with('success', 'Material eliminado de la lista temporal.');
    }

    public function clearTempList(Request $request)
    {
        // Elimina la lista temporal y el total de la sesión
        $request->session()->forget(['tempList', 'totalPrice']);

        return redirect()->back()->with('success', 'Lista temporal vaciada.');
    }
}
