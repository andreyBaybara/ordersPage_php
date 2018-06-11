<?php

namespace App\Http\Controllers;



use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Order;



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
        $query = Order::query();
        if(!empty($request->input('startDate')))
           $query->where('order_add_time', '>=', date('Y-m-d', strtotime($request->input('startDate'))) );
        if(!empty($request->input('endDate')))
            $query->where('order_add_time', '<=', date('Y-m-d', strtotime($request->input('endDate'))) );
        if(!empty($request->input('order_client_phone')))
            $query->where('order_client_phone', 'like', '%'.$request->input('order_client_phone').'%');
        if(!empty($request->input('id')))
            $query->where('id', '=', $request->input('id'));
        if(!empty($request->input('order_state')))
            $query->where('order_state', '=', $request->input('order_state'));
        $goodName = $request->input('order_good');
        if(!empty($goodName)){
            $query->whereHas('goods',function($q) use ($goodName){
                $q->where('good_name','like','%'.$goodName.'%');
            });
        }

        return Response::json($query->with('goods.adverts')->with('states')->get());
    }
}
