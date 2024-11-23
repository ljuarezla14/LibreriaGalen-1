<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class orderController extends Controller
{
    public function index(){

        $orders = Order::query()->where('user_id', Auth::user()->id);


        if (request('status')) {
            $orders->where('status', request('status'));
        }

        $orders=$orders->get();

        $recibido = Order::where('status', 1)->where('user_id', Auth::user()->id)->count();
        $pagado = Order::where('status', 2)->where('user_id', Auth::user()->id)->count();
        $entregado = Order::where('status', 3)->where('user_id', Auth::user()->id)->count();
        $cancelado = Order::where('status', 4)->where('user_id', Auth::user()->id)->count();

        return view('orders.index', compact('orders', 'recibido', 'pagado', 'entregado', 'cancelado'));
    }

    public function show(Order $order){


        return view('orders.show', compact('order'));

    }
}
