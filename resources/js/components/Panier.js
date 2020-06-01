import EventBus from '../_helpers/eventBus';
import {
    panierServices
} from '../_services/panier.services';

export default {
    data() {
        return {
            quantites: 0,
            items: [],
        }
    },
    created() {
        this.quantites = panierServices.panierTaille()
        this.initDropdown(panierServices.getPanier())
        this.getPanier();
    },
    methods: {
        getPanier() {
            // this.quantites = panierServices.getBascket();
            EventBus.$on('basketSize', (quantites) => {
                this.quantites = quantites;
                this.initDropdown(panierServices.getPanier())
            });
        },

        initDropdown() {

        },
    }
}