<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Point;
use App\Categorie;
use App\Agent;
use DB;

class ApiController extends Controller
{
    public function getAllPoints(){
        //logic to get all points
        //return Point::all();
        //$point = point::all()->toJson(JSON_PRETTY_PRINT);
        $point = DB::table('points')
                            ->join('categories', 'points.num_categorie', '=', 'categories.num_categorie')
                            ->join('agents', 'points.num_agent', '=', 'agents.num_agent')
                            ->select('points.id_point','points.coordonnees','points.nom as nom','points.ville','points.description','agents.nom as agent','points.date_saisie as date saisie','categories.nom as categorie')
                            ->orderBy('id_point')
                            ->get()
                            ->toJson(JSON_PRETTY_PRINT);
        return response($point,200);
        
    }

    public function createPoint(Request $request){
        //logic to create a point record goes here
        //$point = Point::create($request->all());
        //return response()->json($article, 201);
        $point = new Point;
        $point->coordonnees = $request->coordonnees;
        $point->nom = $request->nom;
        $point->ville= $request->ville;
        $point->description=$request->description;
        $point->num_agent= $request->num_agent;
        $point->date_saisie= $request->date_saisie;
        $point->num_categorie= $request->num_categorie;
        $point->save();
        return response()->json([
            "message"=>"point record created"
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
        if(Point::where('id_point',$id)->exists()){
            $point = Point::find($id);
            $point->coordonnees = is_null($request->coordonnees) ? $point->coordonnees : $request->coordonnees;
            $point->nom = is_null($request->nom) ? $point->nom : $request->nom;
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
        if(Point::where('id_point',$id)->exists()){
            $point = Point::find($id);
            $point->delete();

            return response()->json([
                "message"=> "records deleted"
            ],202);
        }else{
            return response()->json([
                "message"=>"Point not found"
            ],404);
        }
    }
//------------------------------------------------------------------------------------------------------------------------Categorie

    // récupérer la liste des catégories
    public function getAllCategories(){
        $categories = categorie::all()->toJson(JSON_PRETTY_PRINT);
        return response($categories,200);
    }

    //récuperer tous les agents
    public function getCategorie($id){
        if(categorie::where('num_categorie',$id)->exists()){
            $categorie= categorie::where('num_categorie',$id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($categorie,200);
        }else{
            return response()->json([
                "message"=>"categorie not found"
            ], 404);
        }
    }
    //création du catégorie
    public function createCategorie(Request $request){
        $categorie = categorie::create($request->all());
        $categorie->save();
        return response()->json([
            "message"=>"categorie record created"
        ], 201);
    }

    //update une catégorie
    public function updateCategorie(Request $request,$id){

        if(categorie::where('num_categorie',$id)->exists()){
            $categorie = categorie::find($id);
            $categorie->nom = is_null($request->nom) ? $categorie->nom : $request->nom;
            $categorie->save();
            
            return response()->json([
                "message"=>"records updated successfully"
            ],200);
        }else{
            return response()->json([
                "message"=>"Categorie not found"
            ],404);
        }
    }

    // suppression d'une categorie
    public function deleteCategorie($id){
        if(categorie::where('num_categorie',$id)->exists()){
            $categorie = categorie::find($id);
            $categorie->delete();

            return response()->json([
                "message"=> "records deleted"
            ],202);
        }else{
            return response()->json([
                "message"=>"Categorie not found"
            ],404);
        }
    }


//------------------------------------------------------------------------------------------------------------------------ville

    // récupérer la liste des villes
    public function getAllVille(){
        $ville = point::select('ville')->distinct()->get()->toJson(JSON_PRETTY_PRINT);
        return response($ville,200);
    }


    //------------------------------------------------------------------------------------------------------------------------agent

    //récupérer tous les agents
    public function getAllAgents(){
        $agents = agent::all()->toJson(JSON_PRETTY_PRINT);
        return response($agents,200);
    }

    //récupérer un agent par id
    public function getAgent($id){
        if(agent::where('num_agent',$id)->exists()){
            $agent= agent::where('num_agent',$id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($agent,200);
        }else{
            return response()->json([
                "message"=>"Agent not found"
            ], 404);
        }
    }

    //création d'un agent
    public function createAgent(Request $request){
        //logic to create a point record goes here
        /*$agent = new agent;
        $agent->nom = $request->nom;
        $agent->prenom = $request->prenom;
        $agent->mdp= $request->mdp;*/

        $agent = agent::create($request->all());
        $agent->save();
        return response()->json([
            "message"=>"Agent record created"
        ], 201);
    }

    //update agent 
    public function updateAgent(Request $request,$id){

        if(agent::where('num_agent',$id)->exists()){
            $agent = agent::find($id);
            $agent->nom = is_null($request->nom) ? $agent->nom : $request->nom;
            $agent->prenom = is_null($request->prenom) ? $agent->prenom : $request->prenom;
            $agent->mdp = is_null($request->mdp) ? $agent->mdp : $request->mdp;
            $agent->save();
            
            return response()->json([
                "message"=>"records updated successfully"
            ],200);
        }else{
            return response()->json([
                "message"=>"Agent not found"
            ],404);
        }
    }

    public function deleteAgent($id){
        if(agent::where('num_agent',$id)->exists()){
            $agent = agent::find($id);
            $agent->delete();

            return response()->json([
                "message"=> "records deleted"
            ],202);
        }else{
            return response()->json([
                "message"=>"Agent not found"
            ],404);
        }
    }
}