import {
    authenticationService
} from "../../_services/authentication.service";
import {
    panierServices
} from "../../_services/panier.services";
import { VStripeCard } from 'v-stripe-elements/lib'
import Axios from "axios";

export default {
    components: {
        VStripeCard
    },
    data() {
        return {
            e1: 1,
            itemPanier: [],
            enabled: true,
            panel: [0],
            name: '',
            source: null,
            apiKey: 'pk_test_51GubeKFx1lrpTdSnMcFhukB9eFTG6vXS0XI2S1RXDSGQYGT75ws8htajGFYarb5D8xBKTg3dQWq6UpCyjugGYkxI00ykQtH62F',

            commande: {
                panier: {},
                nom: '',
                prenom: '',
                facturation: {
                    numero: '',
                    adresse: '',
                    codePostal: '',
                    ville: '',
                    pays: '',
                },
                livraison: {
                    numero: '',
                    addresse: '',
                    codePostal: '',
                    ville: '',
                    pays: '',
                },
                paiement: {},
            }
        };
    },
    created() {
        authenticationService.currentUser.subscribe(x => (this.currentUser = x));
        this.getPanier();
    },
    methods: {
        alertCommande() {
            alert("Merci de votre achat !");
        },
        getPanier() {
            this.itemPanier = panierServices.getPanier();
            let itemPanier = {};
            for (let key in itemPanier) {
                let item = itemPanier[key];
                this.itemPanier.push(item);
            }
        },
        confirmation() {
            this.e1 = 2
        },
        saveInfo() {
            if (this.enabled) {
                this.commande.livraison = this.commande.facturation;
            }
            panierServices.envoyerCommande(this.commande).then(response => {
                console.log(response);
            });
            this.e1 = 3
        },
        submitPaymentMethod() {
            console.log(" ** submit ** ");
            this.commande.paiement = this.source;
            panierServices.paiement(this.commande).then(response => {
                console.log(response);
            });
        },
    }
}