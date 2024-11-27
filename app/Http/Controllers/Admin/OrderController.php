<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){

        $orders = Order::where('status','<>', 5);

        if (request('status')) {
            $orders->where('status', request('status'));
        }

        $orders=$orders->get();

        $recibido = Order::where('status', 1)->count();
        $pagado = Order::where('status', 2)->count();
        $entregado = Order::where('status', 3)->count();
        $cancelado = Order::where('status', 4)->count();


        return view('admin.orders.index', compact('orders', 'recibido', 'pagado', 'entregado', 'cancelado'))->layout('layouts.admin');
    }
    public function show(Order $order){

        return view('admin.orders.show', compact('order'))->layout('layouts.admin');

    }
}
