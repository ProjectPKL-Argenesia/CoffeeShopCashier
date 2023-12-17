<?php

namespace App\Http\Controllers;

use App\Models\MenuHistory;
use Illuminate\Http\Request;

class MenuHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataMenuHistory = MenuHistory::all();
        return view('pages.menuHistory.index', ['title' => 'Menu History'], compact('dataMenuHistory'));
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
    public function show(MenuHistory $menuHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuHistory $menuHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MenuHistory $menuHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuHistory $menuHistory)
    {
        //
    }
}
