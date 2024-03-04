<?php

namespace App\Http\Controllers;

use App\Charts\TotalPaymentChart;
use App\Models\Menu;
use App\Models\User;
use App\Models\Store;
use Illuminate\Support\Str;
use App\Models\MenuCategory;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStoreRequest;
use App\Models\Cashier;

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
        $dataMenuCategory = MenuCategory::inRandomOrder()->take(3)->get();

        return view('pages.store.index', ['title' => 'Store', 'chart' => $chart->build()], compact('dataStore', 'dataCashier', 'dataMenu', 'dataMenuCategory'));
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
    public function update(Request $request, Store $store)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        //
    }
}
