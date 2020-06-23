import {
    apiServices
} from '../../_services/api.services';
import addProducteur from './addProducteur.vue';

export default {
    components: {
        addProducteur
    },
    data() {
        return {
            headers: [{
                    text: 'Producteurs',
                    align: 'start',
                    value: 'nom'
                },
                {
                    text: 'Nom',
                    value: 'id_user.nom',
                },
                {
                    text: 'Email',
                    value: 'id_user.email',
                },
                {
                    text: 'Actions',
                    value: 'actions',
                },
            ],
            datas: [],
            producteurs: [],
            drawer: false,
        }
    },
    created() {
        this.initialize();
    },
    methods: {
        initialize() {
            apiServices.get('/api/dashboard/producteurs')
                .then(({
                        data
                    }) =>
                    data.data.forEach(data => {
                        this.datas.push(data);
                    })
                )
                .catch();
        },
    }
}