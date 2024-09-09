<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    public function index()
    {
        $kamar = Kamar::all();

        if (request()->is('api/*')) {
            return response()->json($kamar);
        }

        return view('kamar', ['kamar' => $kamar]);
    }

    public function create()
    {
        return view('addkamar');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'fasilitas' => 'required',
            'harga' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = [
            'type' => $request->input('type'),
            'fasilitas' => $request->input('fasilitas'),
            'harga' => $request->input('harga'),
        ];

        if ($request->hasFile('img')) {
            $uploadedImage = $request->file('img');
            $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
            $imagePath = $uploadedImage->storeAs('public/img', $imageName);
            $data['img'] = 'img/' . $imageName;
        }

        Kamar::create($data);

        return redirect()->route('kamar')->with('success', 'Kamar Sukses Dibuat!');
    }

    public function edit($id)
    {
        $kamar = Kamar::find($id);

        return view('editkamar', ['kamar' => $kamar]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required',
            'fasilitas' => 'required',
            'harga' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $kamar = Kamar::findOrFail($id);

        $kamar->type = $request->input('type');
        $kamar->fasilitas = $request->input('fasilitas');
        $kamar->harga = $request->input('harga');

        if ($request->hasFile('img')) {
            $imageName = time() . '_' . $request->file('img')->getClientOriginalName();
            $request->file('img')->storeAs('public/img', $imageName);
            $kamar->img = 'img/' . $imageName;
        }

        $kamar->save();

        return redirect()->route('kamar')->with('success', 'Kamar Sukses Diupdate!');
    }

    public function destroy($id)
    {
        Kamar::destroy($id);

        return redirect()->route('kamar')->with('success', 'Kamar Sukses Dihapus!');
    }
}
