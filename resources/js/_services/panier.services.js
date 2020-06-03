import EventBus from '../_helpers/eventBus'; //producteur/consomateur // patern design

export const panierServices = { // definir dans la class bien toutes les fonction
    ajouter,
    panierTaille,
    getPanier,
    updatePanier
}

function ajouter(quantites, confiture) {
    let panier = getPanier()

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
    if ( _.hasIn(panier, buildKey(confiture))) {
        panier[buildKey(confiture)] = confiture;
        if (panier[buildKey(confiture)].quantites == 0) {
            _.unset(panier, buildKey(confiture));
        }
    } else {
        throw 'error'
    }
    storePanier(panier);
}