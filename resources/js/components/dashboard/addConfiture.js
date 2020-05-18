import axios from 'axios';

export default {
    props: {
        confiture: {
            default: function () {
                return {
                    id: '',
                    intitule: '',
                    prix: '',
                    producteur: '',
                    fruits: [],
                    documents: [],
                }
            }
        },
        update: {
            default: false
        },
    },
    data() {
        return {
            producteurs: [],
            fruits: [],
            search: null,
            show: false,
        }
    },
    watch: {
        search(val) {
            if (val && val.length > 2) {
                this.fruits.name = val;
                axios.get("/api/fruits", {
                        params: {
                            query: val
                        }
                    })
                    .then(({
                        data
                    }) => {
                        data.forEach(data => {
                            this.fruits.push(data);
                        })
                    });
            }
        }
    },
    created() {
        this.getProducteurs();
    },
    computed: {
        formTitle() {
            return this.update == false ? 'Toto veut crée' : 'Toto veux Éditer'
        }
    },
    methods: {
        save() {
            axios.post('/api/create', {
                    intitule: this.confiture.intitule,
                    prix: this.confiture.prix,
                    id_producteur: this.confiture.producteur,
                    fruits: this.confiture.fruits,
                    id: this.confiture.id == '' ? '' : this.confiture.id,
                })
                .then((data) => {
                    console.log(data)
                })
            this.show = false;
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
        editConfiture() {
            this.id = this.confiture.id
            this.intitule = this.confiture.intitule
            this.prix = this.confiture.prix
            this.producteur = this.confiture.producteur
            this.fruitsListe = this.confiture.fruits
            _.merge(this.fruits, this.fruitsListe)
        },
        
        // a metre plus tard dans le "watch"
        importer() {
            // charger le document
            axios.post("api/documents", {
                documents: this.confiture.documents,
            })
            .then((data) => {
                console.log(data);
            })
        }
    },
}
