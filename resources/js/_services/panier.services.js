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
    let qt = 0
    let err = false

    if (!_.hasIn(panier, buildKey(confiture))) {
        panier[buildKey(confiture)] = {
            id: confiture.id,
            intitule: confiture.intitule,
            prix: confiture.prix,
        };
        qt = parseInt(quantites) // on atribue la valeur de quantite 

    } else {
        qt = panier[buildKey(confiture)].quantites + parseInt(quantites) // on atribue la valeur du panier + de la quantite
    }

    // if si qt > confiture quantite
    if (qt > 10) {
        eventBus.$emit('snackError', "les confitures sont limité à 10 exemplaire par commande, 10 confitures " + confiture.intitule + " ont été rajouté dans votre panier")
        qt = 10 // reatribuer la data
        err = true
    }

    if (qt > parseInt(confiture.quantite)) {
        eventBus.$emit('snackError', "Stock épuisé sur ce produit. Il reste " + confiture.quantite + " confiture de " + confiture.intitule + ". Elles sont dans votre panier.")
        qt = parseInt(confiture.quantite) // reatribuer la data
        err = true
    }

    if (!err) {
        eventBus.$emit('snackSuccess', "Le produit à bien été rajouté dans votre panier.")
    }

    panier[buildKey(confiture)].quantites = qt

    storePanier(panier);
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