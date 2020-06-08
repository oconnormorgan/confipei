<template>
  <v-container>
    <h1>Panier :</h1>
    <template>
      <v-row>
        <v-card class="mx-auto mt-4" max-width="250" v-for="(panier,key) in itemPanier" :key="key">
          <v-card-title>{{ panier.intitule }}</v-card-title>
          <v-card-subtitle class="pb-0">Prix : {{ panier.prix }} €</v-card-subtitle>
          <v-card-text class="text--primary mt-1">
            <small>Quantités</small>
            <v-text-field type="number" min="0" v-model="panier.quantites"></v-text-field>
          </v-card-text>
        </v-card>
      </v-row>
      <v-container fluid>
          <v-row>
          <v-col cols="9">
            <p>Facture</p>
          </v-col>
          <v-col cols="3">
              <p>TVA</p>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="9">
            <small>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque eos debitis earum assumenda eius suscipit vel, velit asperiores aspernatur odio autem. Veniam minus soluta facere quo perspiciatis voluptatem maxime rerum?</small>
          </v-col>
          <v-col cols="3">
            <v-btn width="100%" @click="panierGoPaid">passer à l'achat</v-btn>
          </v-col>
        </v-row>
      </v-container>
    </template>
  </v-container>
</template>

<script src="./PanierListe.js"></script>
