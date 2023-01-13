<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => true,
            'items' =>  ItemResource::collection(Item::all())
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'nullable|string|max:255',
            'category_id'=>'required|numeric|exists:categories,id',
            'service_id'=>'required|numeric|exists:services,id',
            'quantity'=>'nullable',
            'item_price'=>'required|numeric',
            'selling_price'=>'required',
            'discount'=>'nullable',
        ]);

        Item::create($request->all());
        return response()->json([
            'status'=>true,
            'msg'=>'Item Created Successfully '
        ]);
    }


    public function update(Request $request, $id)
    {
        $item = Item::whereId($id)->first();
        if ($item) {
            $request->validate([
                'title'=>'required|string|max:255',
                'description'=>'nullable|string|max:255',
                'category_id'=>'required|numeric|exists:categories,id',
                'service_id'=>'required|numeric|exists:services,id',
                'quantity'=>'nullable',
                'item_price'=>'required',
                'selling_price'=>'required',
                'discount'=>'nullable',
            ]);

            $item->update($request->all());
            return response()->json([
                'status' => true,
                'msg' => 'Item Updated Successfully '
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
        $item = Item::whereId($id)->first();
        if ($item){
            $item->delete();
            return response()->json([
                'status'=>true,
                'msg'=>'Item Deleted Successfully '
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'msg'=>'Not Found'
            ]);
        }
    }

}
