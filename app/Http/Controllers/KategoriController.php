<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class KategoriController extends Controller

{ 
    public function index() 
    { 
        $kategori = Kategori::orderBy('nama_kategori', 'asc')->get();
        return view('backend.v_kategori.index', [
        'judul' => 'kategori',  // Perhatikan typo di 'judu1' sebelumnya
        'index' => $kategori
    ]);
    } 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.v_kategori.create', [
            'judul' => 'kategori',
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
            $validatedData = $request->validate([
                'nama_kategori' => 'required|max:255',
            ]);
            Kategori::create($validatedData);
            return redirect()->route('backend.kategori.index')->with('success', 'Kategori berhasil disimpan.');
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
        $edit = Kategori::findOrFail($id);
    
         return view('backend.v_kategori.edit', [
             'judul' => 'kategori',
             'edit' => $edit
         ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $rules = [ 
            'nama_kategori' => 'required|max:255|unique:kategori,nama_kategori,' . $id,]; 
        $validatedData = $request->validate($rules); 
        Kategori::where('id', $id)->update($validatedData); 
        return redirect()->route('backend.kategori.index')->with('success', 'Data berhasil diperbaharui'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->route('backend.kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
