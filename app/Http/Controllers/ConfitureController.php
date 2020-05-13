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
use Illuminate\Support\Facades\Validator;
use LengthException;

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
            $request->input(),
            [
                'intitule' => 'required',
                'prix' => 'required',
                'id_producteur' => 'required',
                'fruits' => '',
            ],
            [
                'required' => 'Le champs :attribute est requis', // :attribute renvoie le champs / l'id de l'element en erreur
            ]
        )->validate();
        
        $addConfiture = new ConfituresModel;
        $addConfiture->intitule = $data['intitule'];
        $addConfiture->prix = $data['prix'];
        $producteur = ProducteursModel::find($data['id_producteur']);

        if (!$producteur) {
            return "Toto ne connait pas le producteur!";
        }

        $addConfiture->producteur()->associate($producteur);
        $addConfiture->save();

        $fruits = [];
        if (is_array($data['fruits'])) {
            foreach ($data['fruits'] as $_fruit) {
                if(isset($_fruit['id'])) {
                    $fruit = FruitsModel::find($_fruit['id']);
                    if (!$fruit) {
                        return "Toto n'as pas trouver les fruits!";
                    }
                    $fruits[] = $fruit->id;
                } else {
                    //ici on vas crer un objet par la suite
                    //objet
                    // X : {{ nom : "nom du fruit donner par le client" }}
                    return "Toto est perdue avec les ids";
                    
                }
            }
        }
        if (!empty($fruits)) {
            $addConfiture->fruits()->attach($fruits);
            
        }
        return new FruitsResource($addConfiture);
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
    public function getFruits()
    {
        $fruits = FruitsModel::all();
        return FruitsResource::collection($fruits);
    }

    public function getNewConfiture()
    {
        $newConfiture = ConfituresModel::orderBy('date', 'desc')->take(1)->get();
        return ConfituresResource::collection($newConfiture);
    }
}
