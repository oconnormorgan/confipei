<template>
  <div class="container">
    <div class="row justify-content-center">
      <div>
        <v-row>
          <H1>Liste des confitures :</H1>
        </v-row>

        <!-- Carte normal -->
        <!-- <v-row>
          <template>
            <v-card
              class="mx-auto mt-4"
              max-width="250"
              v-for="(confiture,key) in confitures"
              :key="key"
            >
              <v-img class="white--text align-end" :src="confiture.image.image">
                <v-card-title>{{ confiture.intitule }}</v-card-title>
              </v-img>

              <v-card-subtitle class="pb-0">Prix : {{ confiture.prix }} €</v-card-subtitle>

              <v-card-text class="text--primary mt-1">
                <small>Liste des fruits</small>

                <div>{{ displayFruits(confiture.fruits) }}</div>
              </v-card-text>
            </v-card>
          </template>
        </v-row>-->

        <!-- Avec filter -->
        <template>
          <v-container fluid>
            <template>
              <v-row>
                <v-col cols="12">
                  <v-autocomplete
                    :items="fruitsListe"
                    :search-input.sync="search"
                    v-model="fruits"
                    item-text="nom"
                    label="Recherche par fruits"
                    color="black"
                    prepend-icon="mdi-search"
                    return-object
                    cache-items
                    hide-no-data
                    multiple
                    @change="filterConfiture"
                  ></v-autocomplete>
                </v-col>
              </v-row>
            </template>

            <template>
              <v-row>
                <template>
                  <v-card
                    class="mx-auto mt-4"
                    max-width="250"
                    v-for="(confiture,key) in confituresListe"
                    :key="key"
                  >
                    <v-img class="white--text align-end" :src="confiture.image.image">
                      <v-card-title>{{ confiture.intitule }}</v-card-title>
                    </v-img>

                    <v-card-subtitle class="pb-0">Prix : {{ confiture.prix }} €</v-card-subtitle>

                    <v-card-text class="text--primary mt-1">
                      <small>Liste des fruits</small>
                      <div>{{ displayFruits(confiture.fruits) }}</div>
                    </v-card-text>
                  </v-card>
                </template>
              </v-row>
            </template>
          </v-container>
        </template>
      </div>
    </div>
  </div>
</template>

<script src="./Home.js"></script>
