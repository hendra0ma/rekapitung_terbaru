<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Saksi;
use App\Models\Tps;
use App\Models\User;
use App\Models\Village;
use App\Models\Config;
use Illuminate\Http\Request;

class HumanVerificationController extends Controller
{
    public function index()
    {
         $data['config'] = Config::first();

        $data['saksi_data'] = User::where('role_id', '=', 8)->get();
        return view('administrator.verifikasi.verifikasi_saksi', $data);
    }

    public function verifikasi_akun()
    {
         $data['config'] = Config::first();

        $data['admin_data'] = User::where('role_id', '!=', 8)->get();
        $data['config'] = Config::first();
        return view('administrator.verifikasi.verifikasi_akun', $data);
    }

    public function verifikasi_saksi()
    {
         $data['config'] = Config::first();

        $data['saksi_data'] = User::where('role_id', '=', 8)->get();
        return view('administrator.verifikasi.verifikasi_saksi', $data);
    }
      
    public function get_verifikasi_akun(Request $request)
    {
        $user        = User::where('id',$request['id'])->first();
        $district    = District::where('id',$user['districts'])->first();
        $village     = Village::where('id',$user['villages'])->first();
        $tps     = Tps::where('user_id',$user['id'])->first();
        return view('administrator.ajax.get_verifikasi_akun',[
            'user' => $user,
            'district' => $district,
        ]);
    }

    public function get_verifikasi_saksi(Request $request)
    {
        $user        = User::where('id',$request['id'])->first();
        $district    = District::where('id',$user['districts'])->first();
        $village     = Village::where('id',$user['villages'])->first();
        $tps         = Tps::where('user_id',$user['id'])->first();
        $saksi       = Saksi::where('tps_id',$tps['id'])->first();
        return view('administrator.ajax.get_verifikasi_saksi',[
            'user' => $user,
            'village' => $village,
            'district' => $district,
            'tps' => $tps,
            'saksi' => $saksi,
        ]);
        

    }

    public function action_verifikasi(Request $request,$id)
    {
        $user = User::where('id',decrypt($id))->update([
            'is_active' => decrypt($request['aksi']),
        ]);
        $role = User::where('id',decrypt($id))->first();
        if($role['role_id'] == 8){
            return redirect('huver/verifikasi_saksi');
        }else{
            return redirect('huver/verifikasi_akun');
        }
    }

}
