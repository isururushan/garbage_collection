<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Articals;
use App\Models\Tickets;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Exception;

class HomeController extends Controller
{
    public function index()
    {
        $articals = Articals::where('active',1)->where('deleted',0)->get();
        $data['articals'] = $articals;

        return view('frontend.home.home',$data);
        
    }
    

}