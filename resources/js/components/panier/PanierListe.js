import {
    panierServices
} from "../../_services/panier.services";
import {
    authenticationService
} from "../../_services/authentication.service";
import {
    apiServices
} from "../../_services/api.services";
import EventBus from '../../_helpers/eventBus';

export default {
    // recuperer les elements
    //    avec Confiture + Quantites
    data() {
        return {
            itemPanier: [],
            fruits: [],
        }
    },
    created() {
        authenticationService.currentUser.subscribe(x => (this.currentUser = x));
        this.getPanier();
    },
    methods: {
        getPanier() {
            this.itemPanier = panierServices.getPanier();
            let itemPanier = {};
            for (let key in itemPanier) {
                let item = itemPanier[key];
                this.itemPanier.push(item);
            }
        },

        validerPanier() {
            panierServices.envoyerCommande().then(response => {
                console.log(response);
            })
        },
    }
}