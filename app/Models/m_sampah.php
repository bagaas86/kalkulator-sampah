<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class m_sampah extends Model
{
    use HasFactory;


    public function checkID()
    {
        return DB::table('sampah')->count();
    }

    public function maxIditem()
    {
        return DB::table('sampah')->max('id_sampah');
    }


    public function allData()
    {
        return DB::table('sampah')->get();
    }

    public function detailData($id_sampah)
    {
        return DB::table('sampah')->where('id_sampah', $id_sampah)->first();
    }

    public function addData($data)
    {
        DB::table('sampah')->insert($data);
    }
}
