import axios from 'axios';
import addConfiture from './dashboard/addConfiture.vue';

export default {
    components: {
        addConfiture
    },
    data() {
        return {
            headers: [{
                    text: 'Confitures',
                    align: 'start',
                    value: 'intitule'
                },
                {
                    text: 'Prix',
                    value: 'prix'
                },
                {
                    text: 'Producteurs',
                    value: 'producteur'
                },
                {
                    text: 'Fruits',
                    value: 'fruits',
                },
                {
                    text: 'Actions',
                    value: 'actions',
                },
            ],
            datas: [],
            confitures: [],
            modal: false
        }
    },
    created() {
        this.initialize();
    },
    methods: {
        initialize() {
            axios.get('/api/liste')
                .then(({
                        data
                    }) =>
                    data.data.forEach(data => {
                        this.datas.push(data);
                    })
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

        // me permet de recevoir l'item confiture et createItem == false || pour le titre
        editItem(item, createItem) {
            console.log(item);
            console.log(createItem);
        },

        // recoit les données du modal [[ données vide ]]
        createItem(item) {
            console.log(item);
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

        @click.stop="show=false"
    },

}
