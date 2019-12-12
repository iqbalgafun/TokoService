<?php
 
namespace App\Http\Controllers;
 
use App\Transaksi;
use Illuminate\Support\Facades\Auth;
// use App\Http\Transaksi;
use Illuminate\Http\Request;
 
class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = auth()->user()->transaksi;
 
        return response()->json([
            'success' => true,
            'data' => $transaksi
        ]);

        // return view('transaksi');
    }
 
    public function getDataByTransaksi(){
        $transaksi = Transaksi::with(['store','status','user'])->where('user_id', Auth::user()->id)->orderBy('id_transaksi', 'ASC')->get();
        // $fix_transaksi = auth()->user()->transaksi;
    return response()->json(['data' => $transaksi]);

    }

    public function getStoreById(){
        $transaksi = Transaksi::with(['store'])->orderBy('id_transaksi', 'ASC')->get();
    return response()->json($transaksi);
    }

    public function show($id_transaksi)
    {
        $transaksi = auth()->user()->transaksi()->find($id_transaksi);
 
        if (!$transaksi) {
            return response()->json([
                'success' => false,
                'message' => 'Transaksi with id ' . $id_transaksi . ' not found'
            ], 400);
        }
 
        return response()->json([
            'success' => true,
            'data' => $transaksi->toArray()
        ], 400);
    }
 
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_store' => 'required',
            'tgl_service' => 'required',
            'catatan_service' =>'required',
            'id_status' => 'required'
        ]);
 
        $transaksi = new Transaksi();
        $transaksi->id_store = $request->id_store;
        $transaksi->tgl_service = $request->tgl_service;
        $transaksi->catatan_service = $request->catatan_service;
        $transaksi->id_status = $request->id_status;
 
        if (auth()->user()->transaksi()->save($transaksi))
            return response()->json([
                'success' => true,
                'data' => $transaksi->toArray()
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Transaksi could not be added'
            ], 500);
    }
 
    public function update(Request $request, $id_transaksi)
    {
        $transaksi = auth()->user()->transaksi()->find($id_transaksi);
 
        if (!$transaksi) {
            return response()->json([
                'success' => false,
                'message' => 'Transaksi with id ' . $id_transaksi . ' not found'
            ], 400);
        }
 
        $updated = $transaksi->fill($request->all())->save();
 
        if ($updated)
            return response()->json([
                'success' => true
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Transaksi could not be updated'
            ], 500);
    }
 
    public function destroy($id_transaksi)
    {
        $transaksi = auth()->user()->transaksi()->find($id_transaksi);
 
        if (!$transaksi) {
            return response()->json([
                'success' => false,
                'message' => 'Transaksi with id ' . $id_transaksi . ' not found'
            ], 400);
        }
 
        if ($transaksi->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Transaksi could not be deleted'
            ], 500);
        }
    }
}