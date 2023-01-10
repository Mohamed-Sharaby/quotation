<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => true,
            'clients' =>  ClientResource::collection(Client::all())
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'trn'=>'required|string|max:255',
            'phone'=>'nullable|numeric',
            'location'=>'nullable|string|max:255',
        ]);

        Client::create($request->all());
        return response()->json([
            'status'=>true,
            'msg'=>'Client Created Successfully '
        ]);
    }


    public function update(Request $request, $id)
    {
        $client = Client::whereId($id)->first();
        if ($client) {
            $request->validate([
                'name'=>'required|string|max:255',
                'trn'=>'required|string|max:255',
                'phone'=>'nullable|numeric',
                'location'=>'nullable|string|max:255',
            ]);

            $client->update($request->all());
            return response()->json([
                'status' => true,
                'msg' => 'Client Updated Successfully '
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
        $client = Client::whereId($id)->first();
        if ($client){
            $client->delete();
            return response()->json([
                'status'=>true,
                'msg'=>'Client Deleted Successfully '
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'msg'=>'Not Found'
            ]);
        }

    }

}
