<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\OrderDetail;
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
        OrderDetail::create([
            'menu_name' => $request->menu_name,
            'price' => $request->price,
            'qty' => $request->qty,
            'tax' => $request->tax,
            'discount' => 0,
        ]);


        return redirect()->to('/transaction')->with('success', 'Data anda berhasil disimpan.');

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
