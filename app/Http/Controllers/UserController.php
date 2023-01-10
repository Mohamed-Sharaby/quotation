<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index()
    {
        return response()->json([
            'status' => true,
            'users' =>  UserResource::collection(User::all())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param
     * @return
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email',
            'phone'=>'nullable|numeric|unique:users,phone',
            'password'=>'required|confirmed|min:6',
            'role'=>'required|string|max:255'
        ]);

        User::create($request->all());
        return response()->json([
            'status'=>true,
            'msg'=>'User Created Successfully '
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param
     * @param int $id
     * @return
     */
    public function update(Request $request, $id)
    {
        $user = User::whereId($id)->first();
        if ($user) {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'phone' => 'nullable|numeric|unique:users,phone,' . $user->cid,
                'password' => 'nullable|confirmed|min:6',
                'role' => 'required|string|max:255'
            ]);

            $user->update($request->all());
            return response()->json([
                'status' => true,
                'msg' => 'User Updated Successfully '
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'msg'=>'Not Found'
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return
     */
    public function destroy($id)
    {
        $user = User::whereId($id)->first();
        if ($user && $id != auth('api')->user()->id){
            $user->delete();
            return response()->json([
                'status'=>true,
                'msg'=>'User Deleted Successfully '
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'msg'=>'Not Found'
            ]);
        }

    }
}
