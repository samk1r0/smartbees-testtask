<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promocode;

class PromoCheckedController extends Controller
{
    public function __invoke(Request $request){
        return Promocode::where('code',$request->code)->first('is_active');
    }
}
