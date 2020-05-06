<?php

namespace App\Http\Controllers;

use App\ConfituresModel;
use App\FruitsModel;
use App\Http\Resources\ConfituresResource;
use App\Http\Resources\FruitsResource;
use App\Http\Resources\UserResource;
use App\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $dataConfiture = Validator::make(
            $request->input(),
            [
                'intitule' => 'required',
                'prix' => 'required',
                'id_producteur' => 'required',

            ],
            [
                'required' => 'Le champs :attribute est requis', // :attribute renvoie le champs / l'id de l'element en erreur
            ]
        )->validate();
        //Ajout en bdd des données validées par le validator
        $confiture = ConfituresModel::create($dataConfiture);
        //Retourne le circuit formaté grace à la ressource
        return new ConfituresResource($confiture);
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
}
