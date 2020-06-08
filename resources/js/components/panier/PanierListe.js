import {
    panierServices
} from "../../_services/panier.services";
import { authenticationService } from "../../_services/authentication.service";

export default {
    // recuperer les elements
    //    avec Confiture + Quantites
    data() {
        return {
            itemPanier: [],
            itemToBuy: [],
            fruits: [],
        }
    },
    created() {
        authenticationService.currentUser.subscribe(x => (this.currentUser = x));
        this.getPanier();
    },
    methods: {
        getPanier() {
            let itemPanier = panierServices.getPanier();
            for (let key in itemPanier) {
                let item = itemPanier[key];
                this.itemPanier.push(item);
            }
        },
        panierGoPaid() { //recupere le services
            
            let itemToBuy = panierServices.getPanier();

            for (let key in itemToBuy) {
                let allItem = itemToBuy[key];
                this.itemToBuy.push(allItem);
            }

        }
    }





    // aficher les elements
}