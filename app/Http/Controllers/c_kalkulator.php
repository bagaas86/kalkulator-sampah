<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_sampah;
use App\Models\m_transaksi;
use Carbon\Carbon;
use DB;
use Auth;


class c_kalkulator extends Controller
{
    public function __construct()
    {
        $this->sampah = new m_sampah();
        $this->transaksi = new m_transaksi();
    }

    public function index()
    {
      $data = [
        'item' => $this->sampah->allData(),
      ];
      return view ('user.kalkulator.index', $data);
    }

    public function tampilModal($id_sampah)
    {
        $data = [
            'item'=> $this->sampah->detailData($id_sampah)
        ];
        return view ('user.kalkulator.tampil', $data);
    }

    public function simpanPerhitungan(Request $request)
    {
      $now = Carbon::now()->format('Y-m-d');
        $data = [
          'id_sampah' => $request->id_sampah,
          'harga_satuan' => $request->harga_satuan,
          'jumlah_sampah' => $request->jumlah_sampah,
          'total' => $request->harga_total, 
          'tanggal' => $now,
          'id_user' => Auth::user()->id,
        ];

        $this->transaksi->addData($data);
        return redirect()->route('kalkulator.index')->with('success','Transaksi berhasil disimpan');
    }
}
