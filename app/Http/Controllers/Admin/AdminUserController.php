<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{

    public function store(Request $request){


        $request->validate([
            'full_name' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'type' => 'required'
        ]);

        try{

                $admin['name'] = $request->full_name;
                $admin['email'] = $request->email;
                
                $admin['password'] = Hash::make($request->password);
                $admin['type'] = $request->type;
                $result = User::create($admin);


                if ($result) {
                    return 1;
                } else {
                    return 0;
                }

            } catch (Exception $ex) {
                return $ex;
            }

    }


    public function delete($id){

        try{

            $admin = User::find($id);
            $admin->user_active = 0;
            $admin->save();

            return 1;

        }catch(Exception $e){
            return $e;
        }

    }


    public function update(Request $request){

        $request->validate([
            'id' =>'required',
            'password' => 'required'
        ]);

        try{

        $id = $request->id;
        $password = $request->password;

        $admin_save = User::where('id', $id)
                                ->update([
                                    'password' => $password
                                    ]);


        if($admin_save){
            return 1;
        }else{
            return 0;
        }

                    }catch(Exception $e){
                        return $e;
                    }

    }




    public function destroy(Request $request){

        $request->validate([
            'id' => 'required'
        ]);

        try{

            $delete = User::where('id', $request->id)->delete();


            if($delete){
                return 1;
            }else{
                return 0;
            }

        }catch(Exception $e){
            return $e;
        }

    }




}