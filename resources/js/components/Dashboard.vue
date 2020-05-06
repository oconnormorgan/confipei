<template>
    <div class="container">
        <div class="row justify-content-center">
            <div>
                <H1>Dashboard</H1>
                <v-data-table :headers="headers" :items="datas" sort-by="data" class="elevation-1">
                    <template v-slot:item.intitule="{ item }">{{ item.intitule }}</template>
                    <template v-slot:item.producteur="{ item }">{{ item.producteur.nom }}</template>
                    <template v-slot:item.fruits="{ item }">{{displayFruits(item.fruit) }}</template>
                </v-data-table>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            dialog: false,
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
        }
    },

}
</script>

