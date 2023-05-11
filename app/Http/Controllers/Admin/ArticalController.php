<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Articals;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Exception;

class ArticalController extends Controller
{
    public function fetchArticals()
    {
        $artical = Articals::where('deleted', '=', '0')->orderby('created_at','desc')->get();
    
    return $artical;
    }
    
    public function store(Request $request)
    {

        try {
            
            $description = $request->description;
            $title = $request->title;
            $imageData = $request->image;
            $data = substr($imageData, strpos($imageData, ',') + 1);
            $data = base64_decode($data);
            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
            Storage::disk('public')->put("/articals/".$fileName , $data);

            $artical['image'] = $fileName;
            $artical['title'] = $title;
            $artical['description'] = $description;
           
            $result = Articals::create($artical);

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
        ]);

        try {

            $id = $request->id;
            $active = $request->active;
            $title = $request->title;
            $description = $request->description;
            $image = $request->image;
         
            if($image != null)
            {
                $imageData = $image;
                $data = substr($imageData, strpos($imageData, ',') + 1);
                $data = base64_decode($data);
                $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
                Storage::disk('public')->put("/articals/".$fileName , $data);
    
                $offerSave = Articals::where('id', $id)
                ->update([
                    'image' => $fileName,
                    'active' => $active,
                    'title' => $title,
                    'description' => $description
                ]);

            }
            else
            {
                $offerSave = Articals::where('id', $id)
                ->update([
                    'active' => $active,
                    'title' => $title,
                    'description' => $description   
                ]);
            }
           

            if($offerSave) {
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
            $delete = Articals::where('id', $request->id)->update(['deleted' => 1]);
            if ($delete) {
                return 1;
            } else {
                return 0;
            }
        } catch (Exception $e) {
            return $e;
        }
    }
}
