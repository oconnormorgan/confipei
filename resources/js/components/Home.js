export default {
    data: () => ({
        confitures: [],
        confituresListe: [],
        fruitsListe: [],
        fruits: [],
        search: null,
    }),
    watch: {
        search(val) {

            // event autocomplete
            // Voir quand il y a un changement
            // in_array en php pour selectionner toutes les confitures possedant les fruits

            if (val && val.length > 2) {
                this.fruitsListe.nom = val;
                axios.get('/api/fruits', {
                        params: {
                            query: val
                        }
                    })
                    .then(({
                        data
                    }) => {
                        data.forEach(data => {
                            this.fruitsListe.push(data);
                            console.log(this.fruitsListe);
                        })
                    });
            }
        }
    },
    computed: {
        username() {
            // We will see what `params` is shortly
            return this.$route.params.username
        },
        intitule() {
            return "Intitule de la confiture"
        },
        prix() {
            return "prix de la confiture"
        }
    },
    created() {
        this.initialize();
    },
    methods: {
        goBack() {
            window.history.length > 1 ? this.$router.go(-1) : this.$router.push('/')
        },
        initialize() {
            axios.get('/api/liste')
                .then(({
                        data
                    }) =>
                    data.data.forEach(confiture => {
                        this.confitures.push(confiture);
                    }),
                    this.confituresListe = this.confitures,
                )
                .catch();

        },
        displayFruits(items) {
            let fruits = [];
            items.forEach(item => {
                fruits.push((item.nom))
            })
            return fruits.join(', ');
        },
        filterConfiture(item) {
            if (_.isEmpty(this.fruits)) {
                
            } else {

            }
        }
    }
}
