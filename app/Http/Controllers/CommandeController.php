<?php

namespace App\Http\Controllers;

use App\AdressesModel;
use App\CommandesModel;
use App\ConfituresModel;
use App\Http\Resources\CommandesResource;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
                'facturation' => 'required',
                'livraison' => 'required',
            ]
        )->validate();

        $user = $request->user();

        DB::beginTransaction();

        try {
            if ($user) {
                $creeCommande = new CommandesModel;
                $user = $this->addUserComande($user, $creeCommande);
                $this->addAdresseFacturation($data['facturation'], $creeCommande, $user);
                $this->addAdresseLivraison($data['livraison'], $creeCommande, $user);
                $creeCommande->save();

                $this->addPanierComande($data['panier'], $creeCommande);
            } else {
                return "pas de compte utilisateur";
            }
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
        DB::commit();

        return new CommandesResource($creeCommande);
    }

    public function addUserComande($user, &$commande)
    {
        $logged = User::where('id', '=', $user->id)->first();
        if (!$logged) {
            throw new Exception('Vous n\'êtes pas connecter');
        }
        $commande->user()->associate($logged);

        return $logged;
    }

    public function addAdresseFacturation($adresse, &$commande, $user)
    {
        $adresse = $this->creeAdresse($adresse, $user);
        $commande->adresseFacturation()->associate($adresse);
    }

    public function addAdresseLivraison($adresse, &$commande, $user)
    {
        $adresse = $this->creeAdresse($adresse, $user);
        $commande->adresseLivraison()->associate($adresse);
    }

    public function creeAdresse($_adresse, $user)
    {
        $adresse = new AdressesModel();
        $adresse->numero = $_adresse['numero'];
        $adresse->adresse = $_adresse['adresse'];
        $adresse->code_postal = $_adresse['codePostal'];
        $adresse->ville = $_adresse['ville'];
        $adresse->pays = $_adresse['pays'];
        $adresse->user()->associate($user);
        $adresse->save();
        return $adresse;
    }

    public function addPanierComande($panier, &$commande)
    {
        foreach ($panier as $_panier) {
            $quantite = $_panier['quantites'];
            $idConfiture = $_panier['id'];
            $confiture = ConfituresModel::find($idConfiture);
            if (!$confiture) {
                throw new Exception('Confiture incorrects');
            }
            $commande->confitures()->attach($confiture, ['quantite' => $quantite]);
        }
    }
}
