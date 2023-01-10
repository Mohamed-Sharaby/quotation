<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClientContactResource;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use App\Models\ClientContact;
use Illuminate\Http\Request;

class ClientContactController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => true,
            'client_contacts' =>  ClientContactResource::collection(ClientContact::all())
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'client_id'=>'required|exists:clients,id',
            'name'=>'required|string|max:255',
            'phone'=>'nullable|numeric',
        ]);

        ClientContact::create($request->all());
        return response()->json([
            'status'=>true,
            'msg'=>'Client Contact Created Successfully '
        ]);
    }


    public function update(Request $request, $id)
    {
        $contact = ClientContact::whereId($id)->first();
        if ($contact) {
            $request->validate([
                'client_id'=>'required|exists:clients,id',
                'name'=>'required|string|max:255',
                'phone'=>'nullable|numeric',
            ]);

            $contact->update($request->all());
            return response()->json([
                'status' => true,
                'msg' => 'Client Contact Updated Successfully '
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
        $client = ClientContact::whereId($id)->first();
        if ($client){
            $client->delete();
            return response()->json([
                'status'=>true,
                'msg'=>'Client Contact Deleted Successfully '
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'msg'=>'Not Found'
            ]);
        }

    }

}
