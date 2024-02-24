<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Store;
use App\Models\Table;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('pages.transaction.index', ["title" => "Transaction"], compact('dataMenu', 'dataMenuCategory', 'dataTable'));
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

        $currentNoReceipt = Order::max('no_receipt');
        $newNoReceipt = $currentNoReceipt + 1;
        $requestData = json_decode($request->getContent(), true);
        $cartItems = $requestData['cart_item'];
        $orderInfo = $requestData['order_info'];
        $tableId = $cartItems[0]['table_id'];
        $total = $orderInfo['total'];

        $user_id = Auth::id();
        $user = User::find($user_id);
        $store = Store::where('user_id', $user_id)->first();
        $store_id = $store->id;
        // dd($store->id);

        $dataOrder = Order::create([
            'table_id' => $tableId,
            'no_receipt' => $newNoReceipt,
        ]);

        // $user_id = Auth::id();
        // $user = User::find($user_id);
        $user = Auth::user();
        $userAdmin = User::where('name', 'Admin')->first();
        $userIdAdmin = $userAdmin->id;
        
        $cashier_id = null;

        if ($user->hasRole('cashier')) {
            $cashier_id = $user->id;
        }

        $store = Store::where('user_id', $userIdAdmin)->first();
        $store_id = $store->id;
        Payment::create([
            'store_id' => $store_id,
            'cashier_id' => $cashier_id,
            'order_id' => $dataOrder->id,
            'date_payment' => now(),
            'total_price' => $total,
            'type_payment' => 'cash',
            'discount' => 0,
        ]);
        
        
        // if ($user->name === 'Admin') {
        //     $store = Store::where('user_id', $user_id)->first();
        //     // dd($store);

        //     if ($store) {
        //         $store_id = $store->id;
        //         Payment::create([
        //             'store_id' => $store_id,
        //             'cashier_id' => $user_id,
        //             'order_id' => $dataOrder->id,
        //             'date_payment' => now(),
        //             'total_price' => $total,
        //             'type_payment' => 'cash',
        //             'discount' => 0,
        //         ]);
        //     } else {
        //         dd("No store associated with the user");
        //     }
        // } else {
        //     dd("User is not an admin");
        // }

        foreach ($cartItems as $item) {
            $menu = Menu::find($item['id']);

            $menu->stock -= $item['qty'];

            if ($menu->stock < 0) {
                $menu->stock = 0;
            }

            $menu->save();

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
