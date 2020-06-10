<?php

namespace App\Http\Controllers;

use App\CommandesModel;
use App\ConfituresModel;
use App\Http\Resources\CommandesResource;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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

    public function commandePanier(Request $request)
    {
        $data = Validator::make(
            $request->all(),
            [
                'panier' => 'required',
            ]
        )->validate();

        //recup User, lier à la commande, verifier les confitures, RollBack si ça n'exsite pas

        $user = $request->user();
        DB::beginTransaction();
        try {
            if ($user) {
                $creeCommande = new CommandesModel;
                $logged = User::where('id', '=', $user->id)->first();
                if (!$logged) {
                    throw new Exception('Vous n\'êtes pas connecter');
                }
                $creeCommande->users()->associate($logged);
                $creeCommande->save();
                foreach ($data['panier'] as $_panier) {
                    $quantite = $_panier['quantites'];
                    $idConfiture = $_panier['id'];
                    $confiture = ConfituresModel::find($idConfiture);
                    if (!$confiture) {
                        throw new Exception('Confiture incorrects');
                    }
                    $creeCommande->confitures()->attach($confiture, ['quantite' => $quantite]);
                }
            } else {
                return "pas de compte utilisateur";
            }
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
        // DB::commit();

        return new CommandesResource($creeCommande);

        //  verifier si User connecter
        //  si !logged > login
        //  si non
        //  nouvelle vue pour valider la commande
        //    Set 1 verifier la commande
        //    Set 2 addresse de facturation / addresse de livraison / coché si AF = AL
        //    Set 2 paiment 
    }
}
