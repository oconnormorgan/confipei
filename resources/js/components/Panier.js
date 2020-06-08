import EventBus from '../_helpers/eventBus';
import {
    panierServices
} from '../_services/panier.services';

export default {
    data() {
        return {
            quantites: 0,
            itemPanier: [],
        }
    },
    created() {
        this.quantites = panierServices.panierTaille()
        this.initDropdown(panierServices.getPanier())
        this.getPanier();
    },
    methods: {
        getPanier() {
            EventBus.$on('basketSize', (quantites) => {
                this.quantites = quantites;
                this.initDropdown(panierServices.getPanier())
            });
        },

        initDropdown(itemPanier) {
            this.itemPanier = [];
            let counter = 0;
            let breakException = {}
            try {
                for (let key in itemPanier) {
                    let item = itemPanier[key]
                    this.itemPanier.push(item);
                    counter++
                    if (counter === 3) {
                        throw breakException;
                    }
                }
            } catch (e) {
                if (e !== breakException) {
                    throw e
                }
            }


        },
        updateQuantity(item) {
            if(item.quantites == 0 ) {
                if (confirm("être vous êtes sur devouloir supprimer la confiture ?")) {
                    panierServices.updatePanier(item);
                } else {
                    item.quantites = 1; //todo bug si 2fois
                }
            }
        }
    }
}