import axios from 'axios';

export default {
    data() {
        return {
            headers: [{
                    text: 'Producteur',
                    align: 'start',
                    value: 'nom'
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
            axios.get('/api/producteurs')
                .then(({
                        data
                    }) =>
                    data.data.forEach(data => {
                        this.datas.push(data);
                    })
                )
                .catch();
        },
    },

}
