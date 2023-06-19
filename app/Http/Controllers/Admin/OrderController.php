<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $model = app(Order::class);

        return view('admin/orders', ['orders' => $model->getOrders()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forms/order');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'name' => ['required', 'string'],
        'email' => ['required', 'string'],
        'phonenumber' => ['required'],
        'order' => ['required']
       ]);

       return response()->json($request->only('name', 'email', 'phonenumber', 'order'));
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
