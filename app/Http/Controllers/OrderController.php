<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Mail\OrderCreated;
use App\Order;
use Illuminate\Http\Request;
use Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = auth()
          ->user()
          ->orders()
          ->with([
            'product' => function ($q) {
                $q->withTrashed();
            }
          ])
          ->latest()
          ->paginate(3);

        return view('order.index', ['orders' => $orders]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrderRequest $request)
    {
        $order = Order::create($request->all([
          'product_id',
          'email',
          'name',
          'user_id',
        ]));

        // todo email admin message here

        $adminEmail = setting()->get('admin_email');

        Mail::to($adminEmail)->send(new OrderCreated($order));

        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('order.show', ['order' => $order]);
    }

    public function admin()
    {
        $orders = Order::latest()
          ->with([
            'product' => function ($q) {
                $q->withTrashed();
            }
          ])
          ->paginate(3);

        return view('order.admin', ['orders' => $orders]);
    }

}
