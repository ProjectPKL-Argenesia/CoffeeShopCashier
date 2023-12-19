<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuCategory;

class MenuCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataMenuCategory = MenuCategory::all();
        return view('pages.menuCategory.index', ['title' => 'Menu Category'], compact('dataMenuCategory'));
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
            'category_name' => 'required|string|max:255',
            'type' => 'required',
        ]);

        MenuCategory::create($validatedData);

        return redirect()->to('/menuCategory')->with('success', 'Data anda berhasil disimpan.');
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
            'category_name' => 'required|string|max:255',
            'type' => 'required',
        ]);
        $dataMenuCategory = MenuCategory::find($id);
        $dataMenuCategory->update($validatedData);

        return redirect()->to('/menuCategory')->with('success', 'Data anda berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataMenuCategory = MenuCategory::find($id);
        $dataMenuCategory->delete();

        return redirect()->to('/menuCategory')->with('success', 'Data anda berhasil dihapus.');
    }
}
