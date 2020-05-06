<template>
    <div class="container">
        <div class="row justify-content-center">
            <div>
                <H1>Dashboard</H1>
                <v-data-table :headers="headers" :items="datas" sort-by="data" class="elevation-1">
                    <template v-slot:top>
                      <v-toolbar flat color="white">
                        <v-toolbar-title>Liste des confitures</v-toolbar-title>
                        <v-divider
                          class="mx-4"
                          inset
                          vertical
                        ></v-divider>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialog" max-width="500px">
                            <template v-slot:activator="{ on }">
                                <v-btn color="primary" dark class="mb-2" v-on="on"><i class="fas fa-plus-circle fa-2x"></i></v-btn>
                            </template>
                            <v-card>
                              <v-card-title>
                                  <span class="headline">{{ formTitle }}</span>
                                </v-card-title>

                                <v-card-text>
                                  <v-container>
                                    <v-row>
                                      <v-col cols="12" sm="6" md="4">
                                        <v-text-field v-model="intitule" label="Intitulée"></v-text-field>
                                      </v-col>
                                      <v-col cols="12" sm="6" md="4">
                                        <v-text-field v-model="prix" label="Prix"></v-text-field>
                                      </v-col>
                                      <v-col cols="12" sm="6" md="4">
                                        <v-text-field v-model="id_producteur" label="Producteur"></v-text-field>
                                      </v-col>
                                    </v-row>
                                  </v-container>
                                </v-card-text>

                                <v-card-actions>
                                  <v-spacer></v-spacer>
                                  <v-btn color="blue darken-1" text @click="close">Annuler</v-btn>
                                  <v-btn color="blue darken-1" text @click="save">Sauvegarder</v-btn>
                                </v-card-actions>

                            </v-card>
                        </v-dialog>
                      </v-toolbar>
                    </template>
                    <template v-slot:item.actions="{ item }">
                      <v-icon
                        small
                        class="mr-2"
                        @click="editItem(item)"
                      >
                        mdi-pencil
                      </v-icon>
                      <v-icon
                        small
                        @click="deleteItem(item)"
                      >
                        mdi-delete
                      </v-icon>
                    </template>
                    <template v-slot:no-data>
                      <v-btn color="primary" @click="initialize">Reset</v-btn>
                    </template>
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
            intitule: '',
            prix: '',
            id_producteur: '',
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
    computed: {
      formTitle () {
        return 'Ajouter une confiture';
      },
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
        save (e) {
          axios.post('/api/create', {
              intitule: this.intitule,
              prix: this.prix,
              id_producteur: this.id_producteur
            })
            .then(({ data }) => {
                console.log(data.data);
            })
            .catch(error => {
                console.log(error.response)
            });
          // this.close()
        },
        close () {
          this.dialog = false
        },
    },

}
</script>

