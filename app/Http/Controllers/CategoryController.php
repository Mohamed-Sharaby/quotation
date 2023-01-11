<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => true,
            'categories' =>  CategoryResource::collection(Category::all())
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'required|string|max:255',
        ]);

        Category::create($request->all());
        return response()->json([
            'status'=>true,
            'msg'=>'Category Created Successfully '
        ]);
    }


    public function update(Request $request, $id)
    {
        $category = Category::whereId($id)->first();
        if ($category) {
            $request->validate([
                'title'=>'required|string|max:255',
                'description'=>'required|string|max:255',
            ]);

            $category->update($request->all());
            return response()->json([
                'status' => true,
                'msg' => 'Category Updated Successfully '
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
        $category = Category::whereId($id)->first();
        if ($category){
            $category->delete();
            return response()->json([
                'status'=>true,
                'msg'=>'Category Deleted Successfully '
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'msg'=>'Not Found'
            ]);
        }

    }

}
