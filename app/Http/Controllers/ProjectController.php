<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => true,
            'projects' =>  ProjectResource::collection(Project::all())
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'type'=>'required|string|max:255',
            'name'=>'required|string|max:255',
            'size'=>'required|string|max:255',
            'date'=>'required|date',
            'client_ref'=>'required|string|max:255',
            'country'=>'required|string|max:255',
            'city'=>'required|string|max:255',
            'address'=>'required|string|max:255',
            'client_contact_id'=>'required|numeric|exists:client_contacts,id',
            'client_id'=>'required|numeric|exists:clients,id',
            'payment_terms'=>'required|string|max:255',
        ]);

        Project::create($request->all());
        return response()->json([
            'status'=>true,
            'msg'=>'Project Created Successfully'
        ]);
    }


    public function update(Request $request, $id)
    {
        $project = Project::whereId($id)->first();
        if ($project) {
            $request->validate([
                'type'=>'required|string|max:255',
                'name'=>'required|string|max:255',
                'size'=>'required|string|max:255',
                'date'=>'required|date',
                'client_ref'=>'required|string|max:255',
                'country'=>'required|string|max:255',
                'city'=>'required|string|max:255',
                'address'=>'required|string|max:255',
                'client_contact_id'=>'required|numeric|exists:client_contacts,id',
                'client_id'=>'required|numeric|exists:clients,id',
                'payment_terms'=>'required|string|max:255',
            ]);

            $project->update($request->all());
            return response()->json([
                'status' => true,
                'msg' => 'Project Updated Successfully '
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
        $project = Project::whereId($id)->first();
        if ($project){
            $project->delete();
            return response()->json([
                'status'=>true,
                'msg'=>'Project Deleted Successfully '
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'msg'=>'Not Found'
            ]);
        }

    }

}
