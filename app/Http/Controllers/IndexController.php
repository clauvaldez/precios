<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;

class IndexController extends Controller
{
    public function index()
    {
        $materiales = Material::all();
        return view('welcome', compact('materiales'));


        //return view('home');
    }
}
