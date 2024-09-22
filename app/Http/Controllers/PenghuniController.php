<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Penghuni;
use Illuminate\Http\Request;

class PenghuniController extends Controller
{
    public function index()
    {
        $penghuni = Penghuni::with('kamar')->get();

        return view('penghuni', ['penghuni' => $penghuni]);
    }

    public function create()
    {
        $kamar = Kamar::all();
        return view('addpenghuni', ['kamar' => $kamar]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'identitas' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'kamar_id' => 'required',
        ]);
    
        $data = [
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'kamar_id' => $request->input('kamar_id'),
        ];
    
        if ($request->hasFile('identitas')) { // Check for 'identitas' file
            $uploadedImage = $request->file('identitas');
            $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
            $imagePath = $uploadedImage->storeAs('public/identitas', $imageName);
            $data['identitas'] = 'identitas/' . $imageName; // Store image path in 'identitas'
        }
    
        Penghuni::create($data);
    
        return redirect()->route('penghuni')->with('success', 'Penghuni Sukses Dibuat!');
    }
    
    public function edit($id)
    {
        $penghuni = Penghuni::find($id);
        $kamar = Kamar::all();

        return view('editpenghuni', ['penghuni' => $penghuni, 'kamar' => $kamar]);

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'identitas' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kamar_id' => 'required',
        ]);
    
        $penghuni = Penghuni::findOrFail($id);
        
        $penghuni->nama = $request->input('nama');
        $penghuni->alamat = $request->input('alamat');
        $penghuni->kamar_id = $request->input('kamar_id');
    
        if ($request->hasFile('identitas')) {
            $imageName = time() . '_' . $request->file('identitas')->getClientOriginalName();
            $request->file('identitas')->storeAs('public/identitas', $imageName);
            $penghuni->identitas = 'identitas/' . $imageName;
        }
    
        $penghuni->save();
    
        return redirect()->route('penghuni')->with('success', 'Penghuni Sukses Diupdate!');
    }
    
    public function destroy($id)
    {
        Penghuni::destroy($id);

        return redirect()->route('penghuni')->with('success', 'Penghuni Sukses Dihapus!');
    }
}
