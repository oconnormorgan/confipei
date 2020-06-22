import {
    panierServices
} from '../../_services/panier.services';
import eventBus from '../../_helpers/eventBus';

export default {
    data() {
        return {
            quantites: 0,
            max: '',
            active: false,
            rules: [
                value => {
                    const pattern = /^[0-9]{1,2}$/
                    return pattern.test(value) || 'Chiffres, 2 characteres max'
                },
            ],
        }
    },
    props: {
        confiture: {
            required: true,
        },
    },
    methods: {
        save() {

            this.confiture.quantite = this.confiture.quantite - this.quantites // todo 

            panierServices.ajouter(this.quantites, this.confiture);
            this.quantites = 0;
        },
        setUp() {
            if (this.confiture.quantite == 0) {
                this.active = true;
            }
            if (this.confiture.quantite > 10) {
                this.max = 10
            } else {
                this.max = this.confiture.quantite
            }
        }
    },
    created() {
        this.setUp();
    }
}