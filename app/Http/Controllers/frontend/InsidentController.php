<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Insidents;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Exception;

class InsidentController extends Controller
{
    //

    public function insident()
    {
        $insidents = Insidents::where('active',1)->where('deleted',0)->get();
        $data['insidents'] = $insidents;

        return view('frontend.insidents.insidents',$data);
    }

  
}
