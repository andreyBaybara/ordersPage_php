<?php

namespace App\Http\Controllers;



use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\State;
use App\Order;



class OrdersController extends Controller
{
    public function getOrders()
    {
        $order_state = State::pluck('state_name')->toArray();
        array_unshift($order_state, "Все");

        return view('orders', [
            'order_state' => $order_state
        ]);
    }

    public function ajaxGetOrders(Request $request)
    {
        \Log::alert($request);

        $query = Order::query();

        if(!empty($request->input('startDate')))



        $data = Order::all();
        return Response::json($data);
    }
}
