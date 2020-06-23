export default {
    props: {
        producteur: {
            default: function () {
                return {
                    id: '',
                    nom: '',
                    id_user: {
                        nom: '',
                        email: '',
                    },
                }
            },
        },
        update: {
            default: false
        },
    },
    data() {
        return {
            drawer: null,
            nom: '',
            user: {
                nom: '',
                email: ''
            }
        }
    },
    methods: {
        toggleDrawer() {
            this.drawer = true
            this.nom = this.producteur.nom 
        },
        save() {
            let editProducteur = {
                nom: this.producteur.nom,
                nomUser: this.producteur.user.nom,
                emailUser: this.producteur.user.email
            }
            console.log(editProducteur)
        }
    },
}