<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    function index(){
        $data=Categories::orderBy('name')->paginate(15);
        return view('pages.categorias',compact('data'));
    }
}
