<?php

namespace App\Http\Controllers;

use App\Models\Penghuni;
use Illuminate\Http\Request;

class PenghuniController extends Controller
{
    public function index()
    {
        $penghuni = Penghuni::all();

        return view('penghuni', ['penghuni' => $penghuni]);
    }

    public function create()
    {
        return view('addpenghuni');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'identitas' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate 'identitas' as the image field
        ]);
    
        $data = [
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
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

        return view('editpenghuni', ['penghuni' => $penghuni]);

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'identitas' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $penghuni = Penghuni::findOrFail($id);
        
        $penghuni->nama = $request->input('nama');
        $penghuni->alamat = $request->input('alamat');
    
        if ($request->hasFile('identitas')) {
            $imageName = time() . '_' . $request->file('identitas')->getClientOriginalName();
            $request->file('identitas')->storeAs('public/img', $imageName);
            $penghuni->identitas = 'img/' . $imageName;
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
