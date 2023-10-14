<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\pengguna;
use DB;

class c_login extends Controller
{
    public function errorPage()
    {
        return view('v_landingPage');
    }

    public function landingPage()
    {
        // $this->item = new item();
        // $this->pengaturan= new pengaturan();
        // $data = [
        //     'item' => $this->item->itemReady(),
        //     'umum' => $this->pengaturan->joinUmum(),
        // ];

        return view('v_landingPage');
    }

    public function index()
    {
        return view('v_login');
    }


    public function check(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ],[
            'username.required'=>'Username wajib terisi',
            'password.required'=>'Password wajib terisi',
        ]);
        $user = $request->username;
        $pass = $request->password;

        if(auth()->attempt(array('username'=>$user,'password'=>$pass)))
        {
            return redirect('/dashboard');
        }
        else
        {
            session()->flash('error', 'Username atau password salah');
            return redirect()->back();
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
 
        return redirect('/');
        // Auth::logout();
        // $request->session()->flush();
        // return redirect()->route('user.login');
    }

    // Login multiuser
    public function dashboard(){

            if(Auth::user()->level == "Admin"){
            $data = [
                'admin' => "Hallo Admin",
                ];
                return view('admin.v_dashboard', $data);
            }else{
                  $data = [
                    'user' => "Hallo User",
                ];
                return view('user.v_dashboard', $data);
            }
    
       
    }

    public function hari(Request $request)
    {
        $data1 = strtotime($request->bulan1);
        $data2 = strtotime($request->bulan2);
        $kalender = CAL_GREGORIAN;
        $bulan = date('m', $data1);
        $tahun = date('Y', $data1);

        $bulan2 = date('m', $data2);
        $tahun2 = date('Y', $data2);

        $hari = cal_days_in_month($kalender, $bulan, $tahun);
        $hari2 = cal_days_in_month($kalender, $bulan2, $tahun2);
        return $hari2;
    }

    public function chartSampah(Request $request)
    {
        $dari = $request->dari;
        $sampai = $request->sampai;
        $sampah = DB::table('transaksi')
        ->join('sampah', 'sampah.id_sampah','=','transaksi.id_sampah')
        ->select('sampah.nama_sampah', DB::raw('SUM(transaksi.jumlah_sampah) as total_jumlah'))
        ->whereBetween('transaksi.tanggal', [$dari, $sampai])
        ->groupBy('sampah.nama_sampah')
        ->get();
    
    $i = 0;
    $h[0] = "Belum Ada sampah";
    $v[0] = 0;
    
    if($sampah->isNotEmpty()) {
        foreach($sampah as $sampahs)
        {
            $h[$i] = $sampahs->nama_sampah;
            $v[$i] = $sampahs->total_jumlah; // Use the correct alias
            $i = $i + 1;
        }
    }
    
    $data = [
        'h' => $h,
        'v' => $v,
    ];
    
    return $data;
    
    }

   
}
