<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;
use App\Models\MenuHistory;
use Illuminate\Http\Request;

class MenuHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataMenuHistory = MenuHistory::latest()->filter(request(['search']))->get();
        $dataMenuCategory = MenuCategory::all();
        return view('pages.menuHistory.index', ['title' => 'Menu History'], compact('dataMenuHistory', 'dataMenuCategory'));
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
        //
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
        $dataMenuHistory = MenuHistory::find($id);
        $dataMenuHistory->delete();

        return redirect()->to('/menuHistory')->with('success', 'Data anda berhasil dihapus.');
    }
}
