<?php

namespace App\Http\Controllers;

use App\Models\Topping;
use Illuminate\Http\Request;

class ToppingController extends Controller
{
    public function index(Request $request)
    {
        $query = Topping::query();

        if ($request->has('search')) {
            $query->where('nama_topping', 'like', "%{$request->search}%");
        }

        $toppings = $query->latest()->get();
        return view('admin.topping.index', compact('toppings'));
    }

    public function create()
    {
        return view('admin.topping.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_topping' => 'required|string|max:255|unique:toppings,nama_topping',
            'harga'        => 'required|numeric|min:0',
            'stok'         => 'required|integer|min:0',
            'status'       => 'required|in:tersedia,habis',
        ]);

        Topping::create($request->all());

        return redirect()->route('admin.topping.index')
            ->with('success', 'Toping berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $topping = Topping::findOrFail($id);
        return view('admin.topping.edit', compact('topping'));
    }

    public function update(Request $request, $id)
    {
        $topping = Topping::findOrFail($id);

        $request->validate([
            'nama_topping' => 'required|string|max:255|unique:toppings,nama_topping,' . $id,
            'harga'        => 'required|numeric|min:0',
            'stok'         => 'required|integer|min:0',
            'status'       => 'required|in:tersedia,habis',
        ]);

        $topping->update($request->all());

        return redirect()->route('admin.topping.index')
            ->with('success', 'Toping berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Topping::findOrFail($id)->delete();
        return redirect()->route('admin.topping.index')
            ->with('success', 'Toping berhasil dihapus.');
    }
}
