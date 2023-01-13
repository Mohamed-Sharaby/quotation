<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuotationResource;
use App\Models\Quotation;
use App\Models\QuotationItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuotationController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => true,
            'quotations' => QuotationResource::collection(Quotation::all())
        ]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'date' => 'required|date|date_format:Y-m-d',
            'project_id' => 'required|numeric|exists:projects,id',
            'version' => 'required|numeric',
            'status' => 'required|string',
            'notes' => 'required|string',
            'items' => 'required|array',
        ]);

        $data['user_id'] = auth('api')->user()->id;

        DB::beginTransaction();

        $quotation = Quotation::create($data);
        $quotation->items()->createMany($request->items);

        DB::commit();
        return response()->json([
            'status' => true,
            'msg' => 'Quotation Created Successfully '
        ]);
    }


    public function update(Request $request, $id)
    {
        $quotation = Quotation::whereId($id)->first();
        if ($quotation) {
            $data = $request->validate([
                'date' => 'required|date|date_format:Y-m-d',
                'project_id' => 'required|numeric|exists:projects,id',
                'version' => 'required|numeric',
                'status' => 'required|string',
                'notes' => 'required|string',
                'items' => 'required|array',
            ]);

            DB::beginTransaction();

            $quotation->update($data);
            $quotation->items()->delete();
            $quotation->items()->createMany($request->items);

            DB::commit();
            return response()->json([
                'status' => true,
                'msg' => 'Quotation Updated Successfully '
            ]);

        } else {
            return response()->json([
                'status' => false,
                'msg' => 'Not Found'
            ]);
        }
    }


    public function destroy($id)
    {
        $quotation = Quotation::whereId($id)->first();
        if ($quotation) {
            $quotation->delete();
            return response()->json([
                'status' => true,
                'msg' => 'Quotation Deleted Successfully '
            ]);
        } else {
            return response()->json([
                'status' => false,
                'msg' => 'Not Found'
            ]);
        }
    }

}
