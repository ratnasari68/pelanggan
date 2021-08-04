<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DataTables;

class PelangganController extends Controller
{

    public function index(Request $request)
    {
        // Select * From pelanggan
        if (request()->ajax()) {
            $pelanggan = Pelanggan::get();

            return response()->json([
                'code' => 200,
                'pelanggan' => $pelanggan
            ], 200);
        }

        $pelanggan = Pelanggan::get();


         return view('pelanggan.index', compact('pelanggan'));
    }

    public function create()
    {
       // return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        $pelanggan = Pelanggan::create(
            [
                'nama' => $request->nama,
                'pesanan' => $request->pesanan,
                'jumlah' => $request->jumlah,
                'alamat' => $request->alamat,
            ]
        );

        return response()->json([
            'code' => 200,
            'message' => 'Pelanggan berhasil ditambahkan',
            'pelanggan' => $pelanggan
        ], 200);
     // $validator = Validator::make($request->all(), [
      //          'nama' => 'required|min:5',
      //          'pesanan' => 'required'
       //     ]);

        //    if ($validator->fails()) {
         //      return redirect('/create')
         //                ->withErrors($validator)
          //                  ->withInput();
           // }
            //Pelanggan::create([
             //   'nama' => $request->nama,
               // 'pesanan' => $request->pesanan,
                //'jumlah' => $request->jumlah,
                //'alamat' => $request->alamat
           // ]);

            //return redirect()->route('pelanggan.index')->with('success', 'Pelanggan Berhasil ditambahkan');
    }

    public function show(Pelanggan $pelanggan)
    {
        //
    }

    public function edit(Pelanggan $pelanggan)
    {
      //  $pelanggan = Pelanggan::find($id);
       // return view('pelanggan.edit', compact('pelanggan'));
       return response()->json([
        'code' => 200,
        'pelanggan' => $pelanggan
    ], 200);
    }

    public function update(Request $request)
    {
      //  $validator = Validator::make($request->all(), [
      //      'nama' => 'required|min:5',
       //     'pesanan' => 'required'
       // ]);

       // if ($validator->fails()) {
       //     return redirect('pelanggan/'.$request->id.'/edit')
        //                ->withErrors($validator)
        //              ->withInput();
       // }

        // $update = Pelanggan::where('id', $request->id)->update([
        // 'nama' => $request->nama,
        //  'pesanan' => $request->pesanan,
          //  'jumlah' => $request->jumlah,
            //'alamat' => $request->alamat
       // ]);


         //   return redirect()->route('pelanggan.index')->with('success', 'Pelanggan Berhasil diupdate');

    }

    public function destroy(Pelanggan $pelanggan, $id)
    {
      //  $pelanggan = Pelanggan::find($id);
        //$pelanggan->delete();
        //return redirect()->route('pelanggan.index')->with('success', 'Pelanggan Berhasil dihapus');
        $pelanggan = Pelanggan::find($id);
        $pelanggan->delete();

        return response()->json([
            'code' => 200,
            'message' => 'pelanggan berhasil dihapue',
        ], 200);
    }

}
