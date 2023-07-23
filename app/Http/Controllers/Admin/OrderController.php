<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\Create;
use App\Http\Requests\Orders\Update;
use App\Models\Order;
use App\Queries\OrdersQueryBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{


    public function __construct(
        protected OrdersQueryBuilder $ordersQueryBuilder
    )
    {
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin/orders', ['orders' => $this->ordersQueryBuilder->getAll()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forms/Orders/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Create $request)
    {

       $order = Order::create($request->validated());

       if($order){
            return redirect()->route('admin.orders.index')->with('success', 'Order saved');
       }

       return redirect()->route('admin.orders.index')->with('error', 'Order has not been saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('forms/Orders/edit', [
            'order' => $order
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request, Order $order): RedirectResponse
    {
        $order = $order->fill($request->validated());

        if($order->save()){
            return redirect()->route('admin.orders.index')->with('success', 'Order has been updated');
        }

        return redirect()->route('admin.orders.index')->with('error', 'Order has not been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
