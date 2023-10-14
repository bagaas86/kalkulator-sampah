<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_sampah;
use DB;
use File;

class c_sampah extends Controller
{
    public function __construct()
    {
        $this->sampah = new m_sampah();
      
       
    }
    public function index()
    {
      $data = [
        "item" => $this->sampah->allData(),
      ];
      return view ('admin.sampah.index', $data);
    }

    public function create()
    {
      $checkiditem = $this->sampah->checkID();
      $id_item = $checkiditem + 1;
      if($checkiditem == null){
          $data =[
              'id_item' => $id_item,
          ];
      }else{
          $maxIditem = $this->sampah->maxIditem();
          $id_item = $maxIditem + 1;
          $data = [
              'id_item' => $id_item,
          ];
      }
        return view ('admin.sampah.create', $data);
    }

    public function store(Request $request)
    {

      $request->validate([
        'nama_sampah' => 'required',
        'harga_sampah' => 'required',
        'deskripsi_sampah' => 'required',
        'foto_sampah' => 'required|mimes:jpg,png',
    ],[
        'nama_sampah.required'=>'Nama Sampah Wajib terisi',
        'harga_sampah.required'=>'Harga Sampah wajib terisi',
        'deskripsi_sampah.required'=>'Deskripsi Sampah Wajib terisi',
        'foto_sampah.required'=>'Foto Sampah Wajib terisi',
        'foto_sampah.mimes'=>'Foto Barang Harus Berformat JPG atau PNG',
    ]);

    $file = $request->foto_sampah;
    $filename = $request->id_item.'.png';   
    $file->move(public_path('foto/sampah'),$filename);
    $data = [
        'nama_sampah'=> $request->nama_sampah,
        'harga_sampah' => $request->harga_sampah,
        'deskripsi_sampah'=> $request->deskripsi_sampah,
        'foto_sampah'=> $filename
    ];

    $this->sampah->addData($data);
    return redirect()->route('sampah.index')->with('success','Sampah berhasil ditambahkan');

    }
}
