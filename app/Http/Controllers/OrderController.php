<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $order = new Order();
        $order->product_id = $request->product_id;
        $order->buyer_name = $request->buyer_name;
        $order->buyer_email = $request->buyer_email;
        $order->save();

        return json_encode(['result' => 'success'], JSON_UNESCAPED_UNICODE);
    }

}
