<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_transaksi;
use Auth;
class c_riwayat extends Controller
{
    public function __construct()
    {
        $this->transaksi = new m_transaksi();
      
       
    }
    public function index()
    {
      $data = [
        "transaksi" => $this->transaksi->myData(Auth::user()->id),
      ];
      return view ('user.riwayat.index', $data);
    }
}
