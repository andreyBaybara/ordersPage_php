<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EditProductFormRequest;
use App\Models\Good;
use App\Models\Advert;


class ProductsController extends Controller
{
    public function getEditProduct($id)
    {
        $product = Good::whereKey($id)->first();

        $data = Advert::select(
            \DB::raw('CONCAT(first_name, ", ", last_name,CHAR(13),login) AS full_name'), 'id')->get()->pluck('full_name', 'id');

        return view('Frontend\Controllers\ProductsController\editProducts', [
            'product' => $product,
            'adverts' => $data,
            'navigation_id' =>'products'
        ]);
    }

    public function postEditProduct(EditProductFormRequest $request)
    {
        $good = Good::find($request->input('id'));
        $good->fill($request->only(['name', 'price', 'advert_id'])) ->save();

        return redirect()->route('products')->with('status', 'Done');
    }


    public function getProducts()
    {
        $products = Good::with('adverts')->get();

        return view('Frontend\Controllers\ProductsController\products', [
            'products' => $products,
            'navigation_id' =>'products'
        ]);
    }
}
