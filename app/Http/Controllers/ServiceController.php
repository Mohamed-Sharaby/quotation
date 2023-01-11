<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => true,
            'services' =>  ServiceResource::collection(Service::all())
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
        ]);

        Service::create($request->all());
        return response()->json([
            'status'=>true,
            'msg'=>'Service Created Successfully '
        ]);
    }


    public function update(Request $request, $id)
    {
        $service = Service::whereId($id)->first();
        if ($service) {
            $request->validate([
                'name'=>'required|string|max:255',
            ]);

            $service->update($request->all());
            return response()->json([
                'status' => true,
                'msg' => 'Service Updated Successfully '
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'msg'=>'Not Found'
            ]);
        }

    }



    public function destroy($id)
    {
        $service = Service::whereId($id)->first();
        if ($service){
            $service->delete();
            return response()->json([
                'status'=>true,
                'msg'=>'Service Deleted Successfully '
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'msg'=>'Not Found'
            ]);
        }

    }

}
