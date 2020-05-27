import axios from 'axios';

export default {
    data() {
        return {
            headers: [{
                    text: 'Confiture',
                    align: 'start',
                    value: 'confiture'
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
            axios.get('')
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
