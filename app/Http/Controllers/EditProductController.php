<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProductFormRequest;
use Illuminate\Http\Request;
use App\Good;
use App\Advert;

class EditProductController extends Controller
{
    public function getEditProduct($id)
    {
        $adverts = [];
        $product = Good::whereKey($id)->first();
        $data = Advert::select(
            'user_first_name',
            'user_last_name',
            'user_login')->get();

        $key = 1;
        foreach ($data as $value)
        {
            $adverts[$key] = $value->user_first_name." ".$value->user_last_name."/n".$value->user_login;
            $key += 1;
        }

        return view('editProducts', [
            'product' => $product,
            'adverts' => $adverts
        ]);
    }

    public function postEditProduct(EditProductFormRequest $request)
    {
        $good = Good::find($request->input('id'));
        $good->fill($request->only(['good_name', 'good_price', 'good_advert'])) ->save();

        return redirect()->route('products')->with('status', 'Done');
    }
}
