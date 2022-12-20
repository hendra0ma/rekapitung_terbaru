<?php

namespace App\Http\Responses;

use App\Models\Config;
use App\Models\MultiAdministrator;
use App\Models\Village;
use DomainException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        if(auth()->user()->role_id == 14){
            return redirect('c1-relawan');
        }
        if(auth()->user()->role_id == 15){
            return redirect('c1-banding');
        }


        if($request->commander !=null){
            Cookie::queue('commander',true);
            return redirect('redirect');
        }
        return redirect('redirect');

    }
}
