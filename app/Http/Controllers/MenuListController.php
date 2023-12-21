<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\MenuHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $validatedData = $request->validate([
            'menu_category_id' => 'required',
            'menu_name' => 'required',
            'type' => 'required',
            'image' => 'required',
            'price' => 'required',
            'tax' => 'required',
        ]);
        
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('image-post');
        }         

        Menu::create([
            'menu_name' => $validatedData['menu_name'],
            'type' => $validatedData['type'],
            'menu_category_id' => $validatedData['menu_category_id'],
            'price' => $validatedData['price'],
            'stock' => 0,
            'tax' => $validatedData['tax'],
            'image' => $validatedData['image'],
        ]);

        MenuHistory::create([
            'menu_name' => $validatedData['menu_name'],
            'type' => $validatedData['type'],
            'menu_category_id' => $validatedData['menu_category_id'],
            'price' => $validatedData['price'],
            'stock' => 0,
            'tax' => $validatedData['tax'],
            'image' => $validatedData['image'],
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
    public function update(Request $request, $id)
    {
        $dataMenu = Menu::find($id);
        $dataMenu->update([
            'menu_category_id' => $request->menu_category_id,
            'menu_name' => $request->menu_name,
            'type' => $request->type,
            'image' => $request->file('image')->store('image-post'),
            'price' => $request->price,
            'tax' => $request->tax,
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $request->file('image')->store('image-post');
        }

        return redirect()->to('/menuList')->with('success', 'Data anda berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataMenu = Menu::find($id);
        $dataMenu->delete();

        return redirect()->to('/menuList')->with('success', 'Data anda berhasil dihapus.');
    }
}
