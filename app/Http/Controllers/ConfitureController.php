<?php

namespace App\Http\Controllers;

use App\ConfituresModel;
use App\FruitsModel;
use App\Http\Resources\ConfituresResource;
use App\Http\Resources\FruitsResource;
use App\Http\Resources\ProducteursResource;
use App\Http\Resources\UserResource;
use App\ProducteursModel;
use App\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ConfitureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $confitures = ConfituresModel::all();
        return ConfituresResource::collection($confitures);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation des données entrées
        $data = Validator::make(
            $request->all(),
            [
                'intitule' => 'required',
                'prix' => 'required',
                'id_producteur' => 'required',
                'fruits' => 'required',
                'id' => '',
                'image' => 'nullable',
            ],
            [
                'required' => 'Le champs :attribute est requis', // :attribute renvoie le champs / l'id de l'element en erreur
            ]
        )->validate();
        
        // le find à partir d'ici //
        // edit //
        $confiture = ConfituresModel::with(['fruits', 'producteur'])->find($data['id']);

        if (!$confiture) {
            $addConfiture = new ConfituresModel;
        } else {
            $addConfiture = $confiture;
        }
        
        $addConfiture->intitule = $data['intitule'];
        $addConfiture->prix = $data['prix'];

        if ($confiture && isset($confiture->producteur) && $confiture->producteur->id != $data['id_producteur']) {
        } else {
            $producteur = ProducteursModel::find($data['id_producteur']);
            if (!$producteur) {
                return "Toto ne connait pas le producteur!";
            }
            $addConfiture->producteur()->associate($producteur);
        }
 
        $addConfiture->save();

        
        $clientFruits = $data['fruits'];
        $confiFruits = []; //stocké les id de la table pivot
        $toDetach =[];
        $toAttach=[];
        $idClientFruits=[];


        foreach ($clientFruits as $_clientFruits) {
            $idClientFruits[] = $_clientFruits['id']; // {{id, nom}, id}
        }

        // je veux {id}

        if ($confiture && isset($confiture->fruits)) {
            foreach ($confiture->fruits as $_fruit) {
                $confiFruits[] = $_fruit->id;
            }
        }

        // on verifie les ids présent
        foreach ($confiFruits as $id) {
            if (!in_array($id, $idClientFruits)) {
                $toDetach []= $id;
            }
        }

        // on verifie les ressemblance
        foreach ($idClientFruits as $id) {
            if (!in_array($id, $confiFruits)) {
                $toAttach []= $id;
            }
        }

        if (!empty($toDetach)) {
            $addConfiture->fruits()->detach($toDetach);
        }

        if (!empty($toAttach)) {
            $addConfiture->fruits()->attach($toAttach);
        }

        $img = $request->get('image');

        $exploded = explode(",", $img);

        if (str::contains($exploded[0], 'gif')) {
            $ext = 'gif';
        } else if (str::contains($exploded[0], 'png')) {
            $ext = 'png';
        } else {
            $ext = 'jpg';
        }

        $decode = base64_decode($exploded[1]);
        $filename = str::random() . "." . $ext;

        $path = storage_path() . "/images/" . $filename;

        file_put_contents($path, $decode);

        if (file_put_contents($filename, $decode)) {
            $addConfiture->image = $filename;
            $addConfiture->save();
        }

        return new FruitsResource($confiture);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getProducteurs()
    {
        $producteurs = ProducteursModel::all();
        return ProducteursResource::collection($producteurs);
    }
    public function getFruits(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $fruits = FruitsModel::where('nom', 'like', '%' . $query . '%')->get();
            return response()->json($fruits);
        }
    }
}
