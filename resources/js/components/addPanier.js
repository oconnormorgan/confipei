import {
    panierServices
} from '../_services/panier.services';

export default {
    data() {
        return {
            quantites: 0,
        }
    },
    props: {
        confiture: {
            required: true
        },
    },
    methods: {
        save() {
            panierServices.ajouter(this.quantites, this.confiture);
            this.quantites = 0;
        }

    },
}