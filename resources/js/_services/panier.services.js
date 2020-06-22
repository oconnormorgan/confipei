import EventBus from '../_helpers/eventBus'; //producteur/consomateur // patern design
import {
    apiServices
} from './api.services';
import eventBus from '../_helpers/eventBus';

export const panierServices = { // definir dans la class bien toutes les fonction
    ajouter,
    panierTaille,
    getPanier,
    updatePanier,
    envoyerCommande,
    paiement,
}

function ajouter(quantites, confiture) {
    let panier = getPanier()

    if (parseInt(quantites) > parseInt(confiture.quantite)) {

        let stock = "Stock épuisé sur ce produit"
        eventBus.$emit('snackError', stock)

    } else {
        if (!_.hasIn(panier, buildKey(confiture))) {
            panier[buildKey(confiture)] = {
                id: confiture.id,
                intitule: confiture.intitule,
                prix: confiture.prix,
                quantites: parseInt(quantites)
            }
        } else {
            panier[buildKey(confiture)].quantites += parseInt(quantites)
        }

        let stock = "Votre commande à été pris en compte"
        eventBus.$emit('snackSuccess', stock)

        storePanier(panier);
    }
}

function buildKey(confiture) {
    return "confiture_" + confiture.id;
}

function getPanier() {
    let panier = localStorage.getItem('currentBasket');
    if (!panier) {
        panier = {}
    } else {
        panier = JSON.parse(panier);
    }
    return panier;
}

function storePanier(panier) {
    localStorage.setItem("currentBasket", JSON.stringify(panier));
    EventBus.$emit('updatePanier', panier);
    emitBasketSize(panier);
}

function emitBasketSize(panier) {
    let taille = _.toPairs(panier).length;
    EventBus.$emit('basketSize', taille);
}

function panierTaille() {
    let panier = getPanier();
    panier = _.toPairsIn(panier).length
    return panier
}

function updatePanier(confiture) {
    let panier = getPanier();
    if (_.hasIn(panier, buildKey(confiture))) {
        panier[buildKey(confiture)] = confiture;
        if (panier[buildKey(confiture)].quantites == 0) {
            _.unset(panier, buildKey(confiture));
        }
    } else {
        throw 'error'
    }
    storePanier(panier);
}

function envoyerCommande(commande) {

    let panier = getPanier();
    let panierListe = [];

    for (let key in panier) {
        let items = {}
        items['id'] = panier[key].id
        items['quantites'] = panier[key].quantites

        panierListe.push(items);
    }

    let comandeFacturation = commande.facturation;
    let comandeLivraison = commande.livraison;

    return apiServices.post('/api/panier', {

        panier: panierListe,
        facturation: comandeFacturation,
        livraison: comandeLivraison,

    }).then(({
        data
    }) => {
        console.log(" ** data panier ** ")
        console.log(data)
    });

}

function paiement(commande) {

    let commandePaiement = commande.paiement;

    return apiServices.post('/api/paiement', {
        paiement: commandePaiement,
    }).then(({
        data
    }) => {
        console.log(data);
    });

}

function updateStatutToCommande(item) {
    console.log(item);
}