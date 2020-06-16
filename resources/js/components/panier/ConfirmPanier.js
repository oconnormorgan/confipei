import { authenticationService } from "../../_services/authentication.service";
import { panierServices } from "../../_services/panier.services";

export default {
    data() {
        return {
            e1: 1,
            itemPanier: [],
            enabled: true,

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
                console.log(this.itemPanier);
            }
        },
        confirmation() {
            this.e1 = 2
        },
        saveInfo() {
            this.commande.panier = panierServices.getPanier();

            if (this.enabled) {
                this.commande.livraison = this.commande.facturation;
            }

            panierServices.envoyerCommande(this.commande);

            this.e1 = 3
        }
    }
}