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
        $dataMenu = Menu::latest()->filter(request(['search']))->get();
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
            'stock' => 'required',
            'tax' => 'required',
            'nama' => 'required',
        ]);

        $existingMenu = Menu::where('menu_name', $validatedData['menu_name'])
            ->first();

        if ($existingMenu) {
            return redirect()->back()->with('error', 'Data sudah ada.');
        }

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('image-post');
        }

        Menu::create([
            'menu_name' => $validatedData['menu_name'],
            'type' => $validatedData['type'],
            'menu_category_id' => $validatedData['menu_category_id'],
            'price' => $validatedData['price'],
            'stock' => $validatedData['stock'],
            'tax' => $validatedData['tax'],
            'image' => $validatedData['image'],
        ]);

        MenuHistory::create([
            'menu_name' => $validatedData['menu_name'],
            'type' => $validatedData['type'],
            'menu_category_id' => $validatedData['menu_category_id'],
            'price' => $validatedData['price'],
            'stock' => $validatedData['stock'],
            'tax' => $validatedData['tax'],
            'image' => $validatedData['image'],
            'nama' => $validatedData['nama'],
            'status' => 'create',
        ]);

        return redirect()->to('/menuList')->with('success', 'Data berhasil disimpan.');
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
        $validatedData = $request->validate([
            'menu_category_id' => 'required',
            'menu_name' => 'required',
            'type' => 'required',
            'image' => 'required',
            'price' => 'required',
            'tax' => 'required',
            'nama' => 'required',
            'stock' => 'required',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('image-post');
        }

        MenuHistory::create([
            'menu_name' => $validatedData['menu_name'],
            'type' => $validatedData['type'],
            'menu_category_id' => $validatedData['menu_category_id'],
            'price' => $validatedData['price'],
            'tax' => $validatedData['tax'],
            'image' => $validatedData['image'],
            'nama' => $validatedData['nama'],
            'status' => 'edit',
            'stock' => $validatedData['stock'],
        ]);


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


    public function restock(Request $request, $id)
    {
        $dataMenu = Menu::find($id);

        $currentStock = $dataMenu->stock;
        $requestedStock = $request->stock;
        $newStock = $currentStock + $requestedStock;

        $dataMenu->update([
            'stock' => $newStock,
        ]);

        MenuHistory::create([
            'menu_category_id' => $dataMenu->menu_category_id,
            'type' => $dataMenu->type,
            'menu_name' => $dataMenu->menu_name,
            'price' => $dataMenu->price,
            'image' => $dataMenu->image,
            'stock' => $request->stock,
            'tax' => $dataMenu->tax,
            'nama' => $request->nama,
            'status' => 'restock',
        ]);

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
