<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;

class IndexController extends Controller
{
    public function index()
    {
        $tempList = session()->get('tempList', []);
    $tempListIds = array_column($tempList, 'id');

        $materiales = Material::all();
        return view('welcome', compact('materiales', 'tempListIds'));




        //return view('home');
    }
}
