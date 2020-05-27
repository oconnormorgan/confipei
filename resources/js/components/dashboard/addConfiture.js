import { apiServices } from '../../_services/api.services';

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
                    image: '',
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
            imageAff: null,
        }
    },
    watch: {
        search(val) {
            if (val && val.length > 2) {
                this.fruits.name = val;
                apiServices.get("/api/fruits", {
                            query: val
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
            apiServices.post('/api/create', {
                    intitule: this.confiture.intitule,
                    prix: this.confiture.prix,
                    id_producteur: this.confiture.producteur,
                    fruits: this.confiture.fruits,
                    id: this.confiture.id == '' ? '' : this.confiture.id,
                    image: this.confiture.image,
                })
                .then((data) => {
                })
            this.show = false;
        },
        getProducteurs() {
            apiServices.get("/api/producteurs")
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
            this.image = this.confiture.image
            _.merge(this.fruits, this.fruitsListe)
        },

        //pour image
        onFileChange(file) {
            this.image = new Image;
            let reader = new FileReader;
            this.imageAff = null;

            reader.onload = (file) => {
                this.confiture.image = file.target.result;
                this.imageAff = file.target.result;
            };
            reader.readAsDataURL(file);
        },
        close() {
            this.show = false;
        }
    },
}
