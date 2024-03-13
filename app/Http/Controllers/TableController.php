<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\MenuCategory;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $dataTable = Table::orderBy('status', 'asc');

        if ($request->has('search')) {
            $dataTable->filter(['search' => $request->search]);
        }

        $dataTable = $dataTable->get();
        $dataMenuCategory = MenuCategory::all();
        $dataMenuCategory = MenuCategory::all();
        return view('pages.table.index', ["title" => "Table"], compact('dataTable', 'dataMenuCategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required',
        ]);

        $existingTable = Table::where('name', $validatedData['name'])
            ->first();

        if ($existingTable) {
            return redirect()->back()->with('error', 'Data sudah ada.');
        }

        Table::create($validatedData);

        return redirect()->to('/table')->with('success', 'Data anda berhasil disimpan.');
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
            'name' => 'required|string|max:255',
            'status' => 'required',
        ]);
        $dataTable = Table::find($id);
        $dataTable->update($validatedData);

        return redirect()->to('/table')->with('success', 'Data anda berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dataTable = Table::find($id);
        $dataTable->delete();

        return redirect()->to('/table')->with('success', 'Data anda berhasil dihapus.');
    }
}
