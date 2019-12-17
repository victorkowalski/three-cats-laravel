<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function create(Request $request)
    {
        return Product::create($request->all());
    }
    
    public function index()
    {
        return view('home');
    }
}
