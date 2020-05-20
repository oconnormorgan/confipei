<template>
  <v-dialog v-model="show" max-width="500px">
    <template v-slot:activator="{ on }">
      <v-btn v-if="!update" color="primary" dark class="mb-2" v-on="on">
        <i class="fas fa-plus-circle fa-2x"></i>
      </v-btn>
      <v-btn icon small v-if="update" v-on="on">
        <v-icon class="mr-2" @click="editConfiture()">mdi-pencil</v-icon>
      </v-btn>
    </template>
    <v-card>
      <v-card-title>
        <span class="headline">{{ formTitle }}</span>
      </v-card-title>

      <v-card-text>
        <v-container>
          <v-row>
            <v-col cols="12" sm="6" md="4">
              <v-text-field v-model="confiture.intitule" label="Intitulée"></v-text-field>
            </v-col>
            <v-col cols="12" sm="6" md="4">
              <v-text-field v-model="confiture.prix" label="Prix"></v-text-field>
            </v-col>
            <v-col cols="12" sm="6" md="4">
              <v-select
                :items="producteurs"
                item-value="id"
                v-model="confiture.producteur"
                item-text="nom"
                label="Producteur"
              ></v-select>
            </v-col>
            <v-col cols="12">
              <v-autocomplete
                :items="fruits"
                item-text="nom"
                v-model="confiture.fruits"
                label="Fruits"
                color="white"
                multiple
                prepend-icon="mdi-database-search"
                return-object
                cache-items
                hide-no-data
                :search-input.sync="search"
              >
                <template>
                  <v-btn icon color="teal" :disabled="fruits.lenght == 0">
                    <v-icon>mdi-plus-circle</v-icon>
                  </v-btn>
                </template>
              </v-autocomplete>
            </v-col>
            <v-col cols="12">
              <template>
                <template>
                  <v-file-input v-model="image" label="File input" v-on:change="onFileChange"></v-file-input>
                </template>
              </template>
            </v-col>
          </v-row>
        </v-container>
      </v-card-text>

      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn color="blue darken-1" text>Annuler</v-btn>
        <v-btn color="blue darken-1" text @click="save">Sauvegarder</v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script src="./addConfiture.js"></script>