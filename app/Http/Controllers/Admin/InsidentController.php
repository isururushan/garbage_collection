<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Insidents;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Exception;

class InsidentController extends Controller
{
    public function fetchInsident()
    {
        $insidents = Insidents::where('deleted', '=', '0')->orderby('created_at','desc')->get();
    
    return $insidents;
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'description' => 'required',
            
        ]);
        

        try {
            $imageData = $request->image;

            $data = substr($imageData, strpos($imageData, ',') + 1);
            $data = base64_decode($data);
            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
            Storage::disk('public')->put("/insident/".$fileName , $data);

            $insident['image'] = $fileName;
            $insident['title'] = $request->title;
            $insident['longitude'] = $request->longitude;
            $insident['latitude'] = $request->latitude;
            $insident['description'] = $request->description;

            $result = Insidents::create($insident);

            if ($result) {
                return 1;
            } else {
                return 0;
            }
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function update(Request $request)
    {

        $request->validate([
            'id' => 'required',
            'title' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',

        ]);

        try{

                $id = $request->id;
                $title = $request->title;
                $longitude = $request->longitude;
                $latitude = $request->latitude;
                $description = $request->description;
                $image = $request->image;
                $active = $request->active;
               
                if($image != null)
                {
                    $imageData = $image;
                    $data = substr($imageData, strpos($imageData, ',') + 1);
                    $data = base64_decode($data);
                    $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
                    Storage::disk('public')->put("/insident/".$fileName , $data);
        
                    $insident_save = Insidents::where('id', $id)
                    ->update([
                        'image' => $fileName,
                        'active' => $active,
                        'title' => $title,
                        'longitude' => $longitude,
                        'latitude' => $latitude,
                        'description' => $description
                    ]);
    
                }
                else
                {
                    $insident_save = Insidents::where('id', $id)
                    ->update([
                        
                        'title' => $title,
                        'longitude' => $longitude,
                        'latitude' => $latitude,
                        'description' => $description,
                        'active' => $active,  
                    ]);
                }
            
                if ($insident_save) {
                    return 1;
                } else {
                    return 0;
                }
            } catch (Exception $e) {
                return $e;
            }
    }

    public function destroy(Request $request)
    {

        $request->validate([
            'id' => 'required'
        ]);

        try {
            $delete = Insidents::where('id', $request->id)->update(['deleted' => 1]);
            if ($delete) {
                return 1;
            } else {
                return 0;
            }
        } catch (Exception $e) {
            return $e;
        }
    }












      //------------------- status changing options----------------------------------------
      public function pending(Request $request){

        $request->validate([
            'id' => 'required'
        ]);


        try{

            $tickets = Insidents::find($request->id);
            
            $pending = Insidents::where('id', $request->id)->update(['status' => '0']);

            if($pending){
                return 1;
            }else{
                return 0;
            }


            }catch(Exception $e){
                return $e;
            }
            
    }

    public function reject(Request $request){

        $request->validate([
            'id' => 'required'
        ]);


        try{

            $tickets = Insidents::find($request->id);
            
            $reject = Insidents::where('id', $request->id)->update(['status' => '2']);

            if($reject){
                return 1;
            }else{
                return 0;
            }


            }catch(Exception $e){
                return $e;
            }
            
    }

    public function done(Request $request){

        $request->validate([
            'id' => 'required'
        ]);


        try{

            $tickets = Insidents::find($request->id);
            
            $done = Insidents::where('id', $request->id)->update(['status' => '1']);

            if($done){
                return 1;
            }else{
                return 0;
            }


            }catch(Exception $e){
                return $e;
            }
            
    }
}
