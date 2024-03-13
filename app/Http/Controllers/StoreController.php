<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\Store;
use App\Models\Cashier;
use App\Models\OrderDetail;
use Illuminate\Support\Str;
use App\Models\MenuCategory;
use Illuminate\Http\Request;
use App\Charts\TotalPaymentChart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreStoreRequest;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TotalPaymentChart $chart)
    {
        $dataStore = Store::all();
        $dataCashier = Cashier::inRandomOrder()->take(3)->get();
        $dataMenu = Menu::inRandomOrder()->take(4)->get(['image', 'menu_name', 'price', 'stock']);
        $dataTopOrder = OrderDetail::select(
            'order_details.menu_name',
            DB::raw('GROUP_CONCAT(menus.price) as prices'),
            DB::raw('GROUP_CONCAT(menus.image) as images'),
            DB::raw('SUM(order_details.qty) as total_qty')
        )
            ->join('menus', 'order_details.menu_name', '=', 'menus.menu_name')
            ->groupBy('order_details.menu_name')
            ->orderBy('total_qty', 'desc')
            ->take(3)
            ->get();

        // Menghapus duplikasi dari hasil GROUP_CONCAT di controller
        foreach ($dataTopOrder as $item) {
            $item->images = implode(',', array_unique(explode(',', $item->images)));
            $item->prices = implode(',', array_unique(explode(',', $item->prices)));
        }
        $dataMenuCategory = MenuCategory::inRandomOrder()->take(3)->get();

        // dd($dataTopOrder);

        return view('pages.store.index', ['title' => 'Store', 'chart' => $chart->build()], compact('dataStore', 'dataCashier', 'dataMenu', 'dataTopOrder', 'dataMenuCategory'));
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
        // dd($request);
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address' => 'required',
            'callCenter' => 'required'
        ]);


        $dataUser = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'email_verified_at' => now(),
            'password' => bcrypt($validatedData['password']),
            'remember_token' => Str::random(10)
        ]);

        $dataUser->assignRole("admin");

        Store::create([
            'user_id' => $dataUser->id,
            'name' => $validatedData['name'],
            'address' => $validatedData['address'],
            'phone_number' => $validatedData['callCenter'],
        ]);

        return redirect()->route('store.index')->with('success', "Data stored added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'callCenter' => 'required|string|max:20', // Assuming this is the phone_number field
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6', // Adjust the minimum password length as needed
        ]);


        // Find the store record
        $store = Store::find($id);

        // Check if the authenticated user is authorized to update this store
        if ($store->user_id == Auth::id()) {
            // Update the store details
            $store->update([
                'name' => $validatedData['name'],
                'address' => $validatedData['address'],
                'phone_number' => $validatedData['callCenter'], // Updated to match the database field
            ]);

            // Update the associated user details (email and password)
            $user = $store->user;
            $user->email = $validatedData['email'];
            $user->password = bcrypt($validatedData['password']); // Hash the password before saving
            $user->save();

            return redirect()->to('/store')->with('success', 'Store information updated successfully.');
        } else {
            // Handle unauthorized update attempt
            return redirect()->to('/store')->with('error', 'Unauthorized update attempt.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        //
    }
}
