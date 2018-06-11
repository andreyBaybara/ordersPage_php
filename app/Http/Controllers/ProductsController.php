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
            \DB::raw('CONCAT(user_first_name, ", ", user_last_name,CHAR(13),user_login) AS full_name'), 'id')->get()->pluck('full_name', 'id');
        \Log::alert($data);

        return view('editProducts', [
            'product' => $product,
            'adverts' => $data
        ]);
    }

    public function postEditProduct(EditProductFormRequest $request)
    {
        $good = Good::find($request->input('id'));
        $good->fill($request->only(['good_name', 'good_price', 'good_advert'])) ->save();

        return redirect()->route('products')->with('status', 'Done');
    }



    public function getProducts()
    {
        $products = Good::with('adverts')->get();

        return view('products', [
            'products' => $products
        ]);
    }
}
