<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClientResource;
use App\Http\Resources\SettingResource;
use App\Models\Client;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => true,
            'settings' =>  SettingResource::collection(Setting::all())
        ]);
    }

    public function update(Request $request, $id)
    {
        $setting = Setting::whereId($id)->first();
        if ($setting) {
            $request->validate([
                'company_name'=>'required|string|max:255',
                'company_address'=>'required|string|max:255',
                'company_trn'=>'required|string|max:255',
                'vat'=>'required',
            ]);

            $setting->update($request->all());
            return response()->json([
                'status' => true,
                'msg' => 'Settings Updated Successfully '
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'msg'=>'Not Found'
            ]);
        }
    }


}
