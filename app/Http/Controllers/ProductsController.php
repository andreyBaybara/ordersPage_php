<?php

namespace App\Http\Controllers;

use App\Good;
use Illuminate\Http\Request;
use App\Goods;

class ProductsController extends Controller
{
    public function getProducts()
    {
        $products = Good::with('adverts')->get();

        return view('products', [
            'products' => $products
        ]);
    }
}
