<?php

namespace App\Http\Controllers;

use App\Models\Gastos;
use Illuminate\Http\Request;

class GastosController extends Controller
{
    public function index(){
        $data=Gastos::orderBy('date','DESC')->paginate(20);
        return view('pages.gastos',compact('data'));
    }
}
