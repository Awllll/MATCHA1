<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topping;

class ToppingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $toppings = Topping::all();
        return view('admin.topping.index', compact('toppings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.topping.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
            'stok'  => 'required|integer|min:0',
        ]);

        Topping::create($request->only('nama','harga','stok'));

        return redirect()->route('topping.index')->with('success','Topping berhasil ditambahkan.');
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
    public function edit(Topping $topping)
    {
        return view('admin.topping.edit', compact('topping'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Topping $topping)
    {
        $request->validate([
            'nama'  => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
            'stok'  => 'required|integer|min:0',
        ]);

        $topping->update($request->only('nama','harga','stok'));

        return redirect()->route('topping.index')->with('success','Topping berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topping $topping)
    {
        $topping->delete();

        return redirect()->route('topping.index')->with('success','Topping berhasil dihapus.');
    }
}
