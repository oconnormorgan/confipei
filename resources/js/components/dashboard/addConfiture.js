import axios from 'axios';

export default {
    data() {
        return {
            intitule: '',
            prix: '',
            producteur: '',
            fruit: '',
            dialog: false,
            producteurs: [],
            fruits: [],
            search: null,
        }
    },
    created() {
        this.getProducteurs();
        this.getFruits();
    },
    watch: {
        search(val) {
            if (val && val.length > 2) {
                axios.get('/api/fruitsliste', {
                        params: {
                            query: val
                        }
                    })
                    .then(({
                            data
                        }) =>
                        console.log(data.data)
                    )
            }
        }
    },
    computed: {
        formTitle() {
            return 'Ajouter une confiture';
        },
    },
    methods: {
        save(e) {
            axios.post('/api/create', {
                    intitule: this.intitule,
                    prix: this.prix,
                    id_producteur: this.producteur,
                })
                .then(({
                    data
                }) => {
                    console.log(data.data);
                })
            this.close()
        },
        close() {
            this.dialog = false
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
    },

}
