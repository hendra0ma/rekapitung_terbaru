<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Regency;
use App\Models\Tps;
use App\Models\Village;
use Illuminate\Http\Request;
use App\Models\Paslon;
use App\Models\Config;

class PublicController extends Controller
{
    public function getRegencies()
    {
        $reg = Regency::select('id','province_id','name')->get();
        if(count($reg) == null) return response()->json(['message'=>"Data NULL"],204);
        return response()->json($reg,200);
    }
    public function getRegenciesByProvinceId(Request $req)
    {
        $reg = Regency::where('province_id',$req->id_prov)->select('id','province_id','name')->get();
        if(count($reg) == null) return response()->json(['message'=>"Data NULL"],204);
        return response()->json($reg,200);
    }
    public function getDistrictByRegencyId(Request $request)
    {
        $district = District::where('regency_id',$request->id)->select('id','regency_id','name')->get();
        if(count($district) == null) return response()->json(['message'=>"Data NULL"],204);
        return response()->json($district,200);
    }
    public function getVillageByDistrictId(Request $request)
    {
        $village = Village::where('district_id',$request->id)->select('id','district_id','name')->get();
           if(count($village) == null) return response()->json(['message'=>"Data NULL"],204);
        return response()->json($village,200);
    }
    public function getTpsByVilage(Request $request)
    {
       $village = Tps::where('villages_id',$request->id)->select('id','villages_id','number')->get();
           if(count($village) == null) return response()->json(['message'=>"Data NULL"],204);
        return response()->json($village,200);
    }   
    public function getSuara(Request $request)
    {
        $config = Config::first();
        $paslon                   = Paslon::with('saksi_data')->get();
        $paslonterverifikasi     = Paslon::with(['saksi_data' => function ($query) {
            $query->join('saksi', 'saksi_data.saksi_id', 'saksi.id')
                ->whereNull('saksi.pending')
                ->where('saksi.verification', 1);
        }])->get();
        if($request->jenis != "terverifikasi"){
            $i = 0;
            foreach ($paslon as $pas) {
                $voice = 0;
                foreach ($pas->saksi_data as $dataTps) {
                    $voice += $dataTps->voice;
                }
                $data[$i] = [
                    'candidate'=> $pas->candidate,
                    'deputy_candidate'=> $pas->deputy_candidate,
                    'voice'=>$voice,
                ];
                $i++;
            }
        }else{
            $i = 0;
            foreach ($paslonterverifikasi as $pas) {
                $voice = 0;
                foreach ($pas->saksi_data as $dataTps) {
                    $voice += $dataTps->voice;
                }
                $data[$i] = [
                    'candidate'=> $pas->candidate,
                    'deputy_candidate'=> $pas->deputy_candidate,
                    'voice'=>$voice,
                ];
                $i++;
            }
        }
        return response()->json($data,200);
}

public function getFraud(Request $request)
    {
        $count_kecurangan  =\App\Models\Tps::join('saksi', 'saksi.tps_id', '=', 'tps.id')
        ->join('users', 'users.tps_id', '=', 'tps.id')
        ->where('saksi.kecurangan', 'yes')
        ->where('saksi.status_kecurangan', 'belum terverifikasi')
        ->select('saksi.*', 'saksi.created_at as date', 'tps.*', 'users.*')
        ->count();   
        return response()->json([
            'fraud_total' => $count_kecurangan
        ],200);
    }
}
