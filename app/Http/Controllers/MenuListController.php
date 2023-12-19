<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\MenuHistory;
use Illuminate\Http\Request;

class MenuListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataMenu = Menu::all();
        $dataMenuCategory = MenuCategory::all();
        return view('pages.menuList.index', ["title" => "Menu List"], compact('dataMenu', 'dataMenuCategory'));
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
        if ($request->file('image')) {
            $request->file('image')->store('image-post');
        }   

        Menu::create([
            'menu_name' => $request->menu_name,
            'type' => $request->type,
            'menu_category_id' => $request->menu_category_id,
            'price' => $request->price,
            'stock' => '0',
            'tax' => $request->tax,
            'image' => $request->image,
        ]);

        MenuHistory::create([
            'menu_name' => $request->menu_name,
            'type' => $request->type,
            'menu_category_id' => $request->menu_category_id,
            'price' => $request->price,
            'stock' => '0',
            'tax' => $request->tax,
            'image' => $request->image,
        ]);

        return redirect()->to('/menuList')->with('success', 'Data anda berhasil disimpan.');
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
