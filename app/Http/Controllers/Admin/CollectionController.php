<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Collection;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Exception;

class CollectionController extends Controller
{
    public function fetchCollection()
    {
        $collection = Collection::where('deleted', '=', '0')->orderby('created_at','desc')->get();
    
    return $collection;
    }
    
    public function store(Request $request)
    {

        try {
            
            $place = $request->place;

            $imageData = $request->image;
            $data = substr($imageData, strpos($imageData, ',') + 1);
            $data = base64_decode($data);
            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
            Storage::disk('public')->put("/Collection/".$fileName , $data);

            $places['image'] = $fileName;
            $places['place'] = $place;
           
            $result = Collection::create($places);

            if ($result) {
                return 1;
            } else {
                return 0;
            }
        } catch (Exception $ex) {
            return $ex;
        }
    }


    
}
