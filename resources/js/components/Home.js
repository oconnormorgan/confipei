import {
    apiServices
} from '../_services/api.services'
import {
    authenticationService
} from "../_services/authentication.service";
import {
    Role
} from "../_helpers/role";
import axios from "axios";
import addPanier from './addPanier.vue';

export default {
    components: {
        addPanier
    },
    data: () => ({
        confitures: [],
        confituresListe: [],
        fruitsListe: [],
        fruits: [],
        search: null,
    }),
    watch: {
        search(val) {
            if (val && val.length > 2) {
                this.fruitsListe.nom = val;
                apiServices.get('/api/fruits', {
                        query: val
                    })
                    .then(({
                        data
                    }) => {
                        data.forEach(data => {
                            this.fruitsListe.push(data);
                        })
                    });
            }
        }
    },
    computed: {
        intitule() {
            return "Intitule de la confiture"
        },
        prix() {
            return "prix de la confiture"
        }
    },
    created() {
        authenticationService.currentUser.subscribe(x => (this.currentUser = x));
        // this.getUser();
        this.initialize();
    },
    methods: {
        // getUser() {
        //     axios.get("/api/user", {
        //         headers: {
        //             Authorization: `Bearer ${this.currentUser.token}`
        //         }
        //     }).then((data) =>
        //         console.log(data)
        //     ).catch((error) =>
        //         console.log(error)
        //     );
        // },
        goBack() {
            window.history.length > 1 ? this.$router.go(-1) : this.$router.push('/')
        },
        initialize() {
            apiServices.get('/api/liste')
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
        filterConfiture() {
            // effacer la liste affiché
            this.confituresListe = [];
            let _confituresListe = [];

            if (_.isEmpty(this.fruits)) { // si vide fait aparaitre toutes les données
                this.confituresListe = this.confitures
            } else {
                // verifié si l'id du fruit est présent dans les confitures.
                this.confitures.forEach(confiture => { //on recuper toutes les confitures
                    if (confiture) {
                        let _confiture = confiture
                        confiture.fruits.forEach(_fruit => { // on recuper tous les fruits des confitures

                            if (_.includes(this.fruits, _fruit.nom)) {
                                _confituresListe[_confiture.id] = _confiture
                            }
                        })
                    }
                })
                _confituresListe.forEach(_confiture => {
                    this.confituresListe.push(_confiture)
                })
            }
        }
    }
}