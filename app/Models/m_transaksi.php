<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class m_transaksi extends Model
{
    use HasFactory;
    public function addData($data)
    {
        DB::table('transaksi')->insert($data);
    }

    public function myData($id_user){
        return DB::table('transaksi')->join('sampah', 'sampah.id_sampah','=','transaksi.id_sampah')->where('transaksi.id_user', $id_user)->get();
    }

}
