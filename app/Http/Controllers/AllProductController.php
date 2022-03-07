<?php

  

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
  

class AllProductController extends Controller
{


    public function index()
    {
       
        return Product::all();
    }

  

}