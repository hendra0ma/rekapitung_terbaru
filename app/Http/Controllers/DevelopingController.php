<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tps;
use App\Models\Paslon;
use App\Models\Saksi;
use App\Models\SaksiData;
use App\Models\User;
use App\Models\Village;
use App\Models\Absensi;
use App\Models\Listkecurangan;
use App\Models\Bukticatatan;
use App\Models\Bukti_deskripsi_curang;
use App\Models\Buktifoto;
use App\Models\Buktividio;
use Illuminate\Support\Facades\Validator;

class DevelopingController extends Controller
{
     public function index()
     {
        $villagee = 3674040006;
        $data['dev'] = User::join('tps','tps.id','=','users.tps_id')->where('villages',$villagee)->where('setup','belum terisi')->first();
        $data['kelurahan'] = Village::where('id',$villagee)->first();
        $data['paslon'] = Paslon::get();
        return view('developing.index',$data);
     }

     public function action_saksi(Request $request)
     {
         
    


        $villagee = 3674040006;
        $images = $request->file('c1_plano')->store('c1_plano');
        $tps = Tps::where('villages_id',$villagee)->where('number',$request['tps'])->first();
        $userrss = User::where('email',$request['email'])->first();
        $tps2 = Tps::where('id',$tps['id'])->update(
          [
            'user_id' =>  $userrss['id'],
            'setup' => 'terisi',
          ]
          );
        $userss = User::where('id',$userrss['id'])->update([
            'tps_id' => $tps['id']
        ]);
        $saksi = new Saksi;
        $saksi->c1_images = $images;
        $saksi->verification = "";
        $saksi->audit = "";
        $saksi->district_id = 3674040;
        $saksi->village_id =  $villagee;
        $saksi->tps_id = $tps['id'];
        $saksi->regency_id = 3674;
        $saksi->overlimit = 0;
        $saksi->save();
        $ide = $saksi->id;
        $paslon = Paslon::get();
        $count = count($paslon);
        for ($i = 0; $i < $count ; $i++) {
            SaksiData::create([
                 'user_id' =>  $userrss['id'],
                 'paslon_id' =>  $i,
                 'district_id' => 3674040,
                 'village_id' =>  $villagee,
                 'regency_id' => 3674,
                 'voice' =>  (int)$request->suara[$i],
                 'saksi_id' => $ide,
            ]);
        }
        return redirect('dev/index');
        
     }


     public function tps_update()
     {
      $villagee = 3674040006;
      $usesr = Tps::where('villages_id',$villagee)->orderBy('id','DESC')->first();
      $use3 = Tps::where('villages_id',$villagee)->first();
      for ($x =  $use3['id']; $x <= $usesr['id']; $x++) {
         $user =  User::where('cek',0)->first();
           User::where('id',$user['id'])->update([
             'tps_id' => $x,
             'cek' => 1,
           ]);
           echo 'Oke';
        }


    }
     public function saksi_update()
     {
        for ($x = 1526; $x <= 1581; $x++) {
         $user =  Saksi::where('cek',0)->first();
           Saksi::where('id',$user['id'])->update([
             'tps_id' => $x,
             'cek' => 1,
           ]);
           echo 'Oke';
        }
     }
     public function tps_user_update()
     {

       $villagee = 3674040006;
       $usesr = User::where('villages',$villagee)->orderBy('id','DESC')->first();
       $use3 = User::where('villages',$villagee)->first();
       for ($x =  $use3['id']; $x <= $usesr['id']; $x++) {
        $tps =  Tps::where('cek',0)->where('villages_id',$villagee)->first();
          Tps::where('id',$tps['id'])->update([
            'user_id' => $x,
            'cek' => 1,
          ]);
          echo 'Oke';

       }
     }


     public function absen()
     {
         $user = User::where('role_id',8)->get();
         foreach ($user as $us) {
            Absensi::create([
                'user_id' => $us['id'],
                'longitude' => '106.8634106',
                'latitude' => '-6.5619046',
                'status' => 'sudah absen',
                
            ]);
            User::where('id',$us['id'])->update([
                'absen' => 'hadir',
                ]);
            echo 'ok';
         }
     }
     public function upload_kecurangan(Request $request)
     {
         
            
         
         $villagee = 3674040006;
         $data['tps'] = Tps::where('villages_id',$villagee)->get();
         $data['list_kecurangan'] = Listkecurangan::get();
         $data['kelurahan'] = Village::where('id',$villagee)->first();

    $data['list_solution'] = Bukti_deskripsi_curang::join('list_kecurangan', 'list_kecurangan.id', '=', 'bukti_deskripsi_curang.list_kecurangan_id')
    ->join('solution_frauds', 'solution_frauds.id', '=', 'list_kecurangan.solution_fraud_id')
    ->where('bukti_deskripsi_curang.tps_id', $request['id'])
    ->select('solution_frauds.*', 'bukti_deskripsi_curang.*', 'list_kecurangan.*', 'list_kecurangan.id as id_list')
    ->get();
    $data['pelanggaran_umum']    = Listkecurangan::where('jenis', 0)->get();
    $data['pelanggaran_petugas'] = Listkecurangan::where('jenis', 1)->get();
    $data['pelanggaran_etik'] = Listkecurangan::where('jenis', 2)->get();
 $villagee = 3674040006;
         $data['tps'] = Tps::where('villages_id',(string)$villagee)->get();
         return view('developing.upload_kecurangan',$data);

     }
   public function upload_kecurangan_2(Request $request)
     {
         $villagee = 3674040006;
         $data['tps'] = Tps::where('villages_id',(string)$villagee)->get();
         $data['list_kecurangan'] = Listkecurangan::get();
         $data['kelurahan'] = Village::where('id',(string)$villagee)->first();
             $data['pelanggaran_umum']    = Listkecurangan::where('jenis', 0)->get();
    $data['pelanggaran_petugas'] = Listkecurangan::where('jenis', 1)->get();
         return view('developing.upload_kecurangan_2',$data);
     
     }
     public function action_upload_kecurangan(Request $request)
     {
         
         
            Validator::make($request->all(), [
            'curang.*' => ['required'],
            'tps'=>['required'],
            'foto' => ['required'],
          
        ])->validate();
         
         $tps = Tps::where('id', $request['tps'])->first();
         $saksi = Saksi::where('tps_id',$request['tps'])->update([
            'status_kecurangan' => 'belum terverifikasi',
            'kecurangan' => 'yes',
        ]);
        $fromListKecurangan = $request['curang'];
            foreach ($fromListKecurangan as $data) {
                Bukti_deskripsi_curang::create([
                    'tps_id' => $request['tps'],
                    'text' => $data,
                ]);
            }
            Bukticatatan::create([
                'tps_id' => $request['tps'],
                'text' => $request['curang'],
            ]);
            Buktifoto::create([
                'url' => $request->file('foto')->store('hukum/bukti_foto'),
                'user_id' => $tps['user_id'],
                'tps_id' => $request['tps'],

            ]);
            Buktividio::create([
                'url' => 1,
                'user_id' => $tps['user_id'],
                'tps_id' => $request['tps'],
                'bukti_vidio' => 0,
            ]);
       
            echo 'Oke sayang input lagi yaaa';
        }
  public function upload_kecurangansss(Request $request)
        {
            
              Validator::make($request->all(), [
            'curang.*' => ['required'],
            'tps'=>['required'],
            'foto' => ['required'],
          
        ])->validate();
         
        
          $tps = Tps::where('id', $request['tps'])->first();
         $saksi = Saksi::where('tps_id',$request['tps'])->update([
            'status_kecurangan' => 'belum terverifikasi',
            'kecurangan' => 'yes',
        ]);
        $fromListKecurangan = $request['curang'];
            // foreach ($fromListKecurangan as $data) {
            //     $list = Listkecurangan::where('id', $data)->first();
            //     Bukti_deskripsi_curang::create([
            //         'tps_id' => $request['tps'],
            //         'text' =>  $list['kecurangan'],
            //         'list_kecurangan_id' => $list['id'],
            //     ]);
             
            // }
            Bukticatatan::create([
                'tps_id' => $request['tps'],
                'text' => $request['curang'],
            ]);
            Buktifoto::create([
                'url' => $request->file('foto')->store('hukum/bukti_foto'),
                'user_id' => $tps['user_id'],
                'tps_id' => $request['tps'],

            ]);
            Buktividio::create([
                'url' => 1,
                'user_id' => $tps['user_id'],
                'tps_id' => $request['tps'],
                'bukti_vidio' => 0,
            ]);
   
            return redirect('/upload_kecurangan');

        }
        public function upload_c1()
        {
            return view('developing.c1_plano');

        }
}
