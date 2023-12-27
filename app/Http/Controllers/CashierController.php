<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Cashier;
use App\Models\User;

class CashierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataUser = User::all();
        $dataCashier = Cashier::all(); 
        return view('pages.cashier.index', ["title" => "Cashier"], compact('dataCashier', 'dataUser'));
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'gender' => 'required',
        ]);
        
        $dataUser = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'email_verified_at' => now(),
            'password' => bcrypt($validatedData['password']),
            'remember_token' => Str::random(10),

        ]);

        $dataUser->assignRole("cashier");
    
        Cashier::create([
            'name' => $validatedData['name'],
            'gender' => $validatedData['gender'],
            'user_id' => $dataUser->id,
        ]);


        return redirect()->route('cashier.index')->with('success', "Data cashier berhasil ditambahkan");
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
        // $dataUser = User::findOrFail($id);
        $dataCashier = Cashier::find($id);
        $dataUser = $dataCashier->user;
        // dd($dataUser);
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'nullable|string|min:3',
            'gender' => 'required',
        ]);

        $dataUser->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => isset($validateData['password']) ? Hash::make($validateData['password']) : $dataUser->password,
        ]);

        $dataCashier->update([
            'name' => $request->name,
            'gender' => $request->gender,
        ]);
        

        return redirect()->route('cashier.index')->with('success', "Data cashier berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataCashier = Cashier::find($id);
        $dataUser = $dataCashier->user;
        $dataUser->delete();

        return redirect()->to('/cashier')->with('success', 'Data anda berhasil dihapus.');
    }
}
