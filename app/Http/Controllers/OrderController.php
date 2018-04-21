<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\Settings;


class OrderController extends Controller
{
    public function index()
    {
        if (!Auth::user()->is_admin) {
            return redirect('/');
        }
        $data = [
            'orders' => Order::all(),
        ];
        return view('orders.index', $data);
    }


    public function store(Request $request)
    {
        if ((empty($request->buyer_name)) || (empty($request->buyer_email))) {
            $data = [
                'result' => 'fail',
                'errorMessage' => 'Необходимо указать Имя и E-mail'
            ];
            return json_encode($data, JSON_UNESCAPED_UNICODE);
        }

        $order = new Order();
        $order->product_id = $request->product_id;
        $order->buyer_name = $request->buyer_name;
        $order->buyer_email = $request->buyer_email;
        $order->save();

        // Отсылаем e-mail на адрес, указанный в базе в настройках
        $ordersInfoEmail = Settings::where('key','=', 'orders_info_email')->get(['value'])->toArray();
        (empty($ordersInfoEmail)) ? ( $ordersInfoEmail = '' ) : ( $ordersInfoEmail = (string)$ordersInfoEmail[0]['value'] );

        if (!empty($ordersInfoEmail)) {
            //Mail::to($ordersInfoEmail)->send(new SendMailable($order));
        }

        return json_encode(['result' => 'success'], JSON_UNESCAPED_UNICODE);
    }

}
