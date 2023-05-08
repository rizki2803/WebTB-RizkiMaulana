<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Barang;

use Ramsey\Uuid\Uuid;
use DataTables;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Barang::get();

        return DataTables::of($data)->addIndexColumn()->make(true);
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

        $store = Barang::create([
            'brg_oid' => Uuid::uuid4()->getHex(),
            'brg_code' => $request->brg_code,
            'brg_nama' => $request->brg_nama,
            'brg_type' => $request->brg_type,
            'brg_harga' => $request->brg_harga
        ]);

        return response()->json($store, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $oid)
    {
        $data = Barang::where('brg_oid', $oid)->get();

        return response()->json($data);
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
    public function update(Request $request, string $oid)
    {
        $data = Barang::where('brg_oid', $oid)->first();

        if (empty($data)) {
            $res['message'] = 'Data tidak ditemukan !';
            $res['data'] = $data;

            return response()->json($res, 404);
        }

        $res['message'] = 'Data Berhasil diubah !';
        $res['data'] = $data;

        $update = $data->update([
            'brg_code' => $request->brg_code,
            'brg_nama' => $request->brg_nama,
            'brg_type' => $request->brg_type,
            'brg_harga' => $request->brg_harga
        ]);

        return response()->json($res, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $oid)
    {
        $data = Barang::where('brg_oid', $oid)->first();

        if (empty($data)) {
            $res['message'] = 'Data tidak ditemukan !';

            return response()->json($res, 404);
        }

        $delete = $data->delete();

        $res['message'] = 'Data Berhasil dihapus !';

        if (!$delete) {
            $res['message'] = 'Data Gagal dihapus !';
        }

        return response()->json($res, 200);
    }
}
