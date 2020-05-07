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
                sortable: false,
                value: 'intitule'
            },
            {
                text: 'Producteurs',
                value: 'producteur'
            },
            {
                text: 'Fruits',
                value: 'fruits'
            },
            ],
            datas: [],
            confitures: [],
        }
    },
    created() {
        this.initialize();
    },
    methods: {
        initialize() {
            axios.get('/api/liste')
                .then(( { data }) =>
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
    },

}