<template>
  
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
              <v-select
                :items="producteurs"
                item-value="id"
                v-model="producteur"
                item-text="nom"
                label="Producteur"
              ></v-select>
            </v-col>
            <v-col cols="12">
              <v-autocomplete
                :items="fruits"
                item-text="nom"
                v-model="fruitsliste"
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
          </v-row>
        </v-container>
      </v-card-text>

      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn color="blue darken-1" text @click="close">Annuler</v-btn>
        <v-btn color="blue darken-1" text @click="save">Sauvegarder</v-btn>
      </v-card-actions>
    </v-card>
  
</template>

<script src="./addConfiture.js"></script>