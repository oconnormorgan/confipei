import axios from 'axios';

export default {
    data() {
        return {
            intitule: '',
            prix: '',
            producteur: '',
            fruitsliste: [],
            producteurs: [],
            fruits: [],
            search: null,
            editedItem: {
                intitule: '',
                producteur: 0,
                fruits: 0,
            },
        }
    },
    created() {
        this.getProducteurs();
        this.getFruits();
    },
    computed: {
        formTitle(e) {
            // je veuxrecevoir createItem == "valeur" || définit si le titre change
            console.log(this);
            return this.createItem == true ? 'Nouvelle confiture' : 'Edité une confiture';
        },
    },
    methods: {
        save() {

            //le fruit (objet) en arrivant ici doit avoir
            //  soit
            //      {{id:"id", nom:"nom"}}
            //  soit
            //      {{nom:"nom"}}

            axios.post('/api/create', {
                intitule: this.intitule,
                prix: this.prix,
                id_producteur: this.producteur,
                fruits: this.fruitsliste,
            })
            this.dialog = false;
        },
        getProducteurs() {
            axios.get("/api/producteurs")
                .then(({
                        data
                    }) =>
                    data.data.forEach(data => {
                        this.producteurs.push(data);
                    })
                );
        },
        getFruits() {
            axios.get("/api/fruits")
                .then(({
                        data
                    }) =>
                    data.data.forEach(data => {
                        this.fruits.push(data);
                    })
                );
        },

        // fermer le modal || ne fonctionne pas
        close () {
            this.dialog = false;
          },
    },

}
