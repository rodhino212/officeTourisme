<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Point;

class ApiController extends Controller
{
    public function getAllPoints(){
        //logic to get all points
        //return Point::all();
        $point = point::all()->toJson(JSON_PRETTY_PRINT);
        return response($point,200);
        
    }

    public function createPoint(Request $request){
        //logic to create a point record goes here
        //$point = Point::create($request->all());
        //return response()->json($article, 201);
        $point = new Point;
        $point->nom = $request->nom;
        $point->ville= $request->ville;
        $point->description=$request->description;
        $point->num_agent= $request->num_agent;
        $point->date_saisie= $request->date_saisie;
        $point->num_categorie= $request->num_categorie;
        $point->save();
        return response()->json([
            "message"=>"point enregistrer"
        ], 201);
    }

    public function getPoint($id){
        //logic to get a student record goes here
        if(Point::where('id_point',$id)->exists()){
            $point= Point::where('id_point',$id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($point,200);
        }else{
            return response()->json([
                "message"=>"Point not found"
            ], 404);
        }
    }

    public function updatePoint(Request $request, $id){
        //logic to update a point record goes here
        // $point = Point::findOrFail($id);
        // $point->update($request->all());
        if(Point::where('id',$id)->exists()){
            $point = Point::find($id);
            $point->name = is_null($request->name) ? $point->name : $request->name;
            $point->ville = is_null($request->ville) ? $point->ville : $request->ville;
            $point->description = is_null($request->description) ? $point->description : $request->description;
            $point->num_agent = is_null($request->num_agent) ? $point->num_agent : $request->num_agent;
            $point->date_saisie = is_null($request->date_saisie) ? $point->date_saisie : $request->date_saisie;
            $point->num_categorie = is_null($request->num_categorie) ? $point->num_categorie : $request->num_categorie;
            $point->save();

            return response()->json([
                "message"=>"records updated successfully"
            ],200);
        }else{
            return response()->json([
                "message"=>"Point not found"
            ],404);
        }
    }

    public function deletePoint($id){
        //logic to delete a point record goes here
        // $point->delete();
        // return response()->json(null, 204);
        if(Point::where('id',$id)->exists()){
            $point = Point::find($id);
            $point->delete();

            return response()->json([
                "message"=> "records deleted"
            ],204);
        }else{
            return response()->json([
                "message"=>"Point not found"
            ],404);
        }
    }


}
