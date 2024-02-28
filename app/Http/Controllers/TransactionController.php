<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Store;
use App\Models\Table;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataMenu = Menu::all();
        $dataMenuCategory = MenuCategory::all();
        $dataTable = Table::all();
        $dataStore = Store::all();
        return view('pages.transaction.index', ["title" => "Transaction"], compact('dataMenu', 'dataMenuCategory', 'dataTable', 'dataStore'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // $data = order::first();
        // $data->no_receipt = $data->no_receipt + 1;

        $currentNoReceipt = Order::max('no_receipt');
        $newNoReceipt = $currentNoReceipt + 1;
        $requestData = json_decode($request->getContent(), true);
        $cartItems = $requestData['cart_item'];
        $tableId = $cartItems[0]['table_id'];

        $dataOrder = Order::create([
            'table_id' => $tableId,
            'no_receipt' => $newNoReceipt,
        ]);

        foreach ($cartItems as $item) {
            OrderDetail::create([
                'menu_name' => $item['menu_name'],
                'order_id' => $dataOrder->id,
                'qty' => $item['qty'],
                'price' => $item['price'],
                'tax' => $item['tax'],
                'discount' => 0,
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Order created successfully',

        ], 200); // 201 Created status code
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
