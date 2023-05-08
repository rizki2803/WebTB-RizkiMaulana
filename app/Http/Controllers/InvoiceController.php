<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Invoice;

use Ramsey\Uuid\Uuid;
use DataTables;
use Str;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Invoice::get();

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
        $count_data = Invoice::count();

        $inv_no = 'INV-'.Str::slug(($count_data+1).'-'.$request->inv_tanggal);

        if (Invoice::where('inv_no', $inv_no)->first()) {
            $inv_no = 'INV'.Str::slug((($count_data+1)+1).$request->inv_tanggal);
        }

        $store = Invoice::create([
            'inv_oid' => Uuid::uuid4()->getHex(),
            'inv_no' => $inv_no,
            'inv_tanggal' => $request->inv_tanggal,
            'inv_jumlah' => $request->inv_jumlah,
            'ref_user_oid' => $request->ref_user_oid,
            'ref_vendor_oid' => $request->ref_vendor_oid
        ]);

        return response()->json($store, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $oid)
    {
        $data = Invoice::where('inv_oid', $oid)->get();

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
        $data = Invoice::where('inv_oid', $oid)->first();

        if (empty($data)) {
            $res['message'] = 'Data tidak ditemukan !';
            $res['data'] = $data;

            return response()->json($res, 404);
        }

        $res['message'] = 'Data Berhasil diubah !';
        $res['data'] = $data;

        $update = $data->update([
            'inv_no' => $request->inv_code,
            'inv_tanggal' => $request->inv_code,
            'inv_jumlah' => $request->inv_code,
            'ref_user_oid' => $request->inv_code,
            'ref_vendor_oid' => $request->inv_code
        ]);

        return response()->json($res, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $oid)
    {
        $data = Invoice::where('inv_oid', $oid)->first();

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
