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
        $order_state = array(0 => 'Все');
        $order_state += State::pluck('name', 'id')->toArray();

        return view('Frontend\Controllers\OrdersController\orders', [
            'order_state' => $order_state,
            'navigation_id' =>'orders'
        ]);
    }

    public function ajaxGetOrders(Request $request)
    {
       // \Log::alert($request->toArray());
        $query = Order::query();
        if(!empty($request->input('startDate')))
           $query->where('add_time', '>=', date('Y-m-d', strtotime($request->input('startDate'))) );
        if(!empty($request->input('endDate')))
            $query->where('add_time', '<=', date('Y-m-d', strtotime($request->input('endDate'))) );
        if(!empty($request->input('client_phone')))
            $query->where('client_phone', 'like', '%'.$request->input('client_phone').'%');
        if(!empty($request->input('id')))
            $query->where('id', '=', $request->input('id'));
        if($request->input('state_id') != 0)
            $query->where('state_id', '=', $request->input('state_id'));

        $goodName = $request->input('good_id');
        if(!empty($goodName)){
            $query->whereHas('goods',function($q) use ($goodName){
                $q->where('name','like','%'.$goodName.'%');
            });
        }

        return Response::json($query->with('goods.adverts')->with('states')->get());
    }
}
