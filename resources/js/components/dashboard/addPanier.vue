<template>
  <v-container fluid class="ma-0 pa-0">
    <v-row class="ma-0 pa-0">
      <v-col cols="6" class="ma-0 pa-0">
        <v-text-field
          :disabled="active"
          type="number"
          min="0"
          :max="max"
          v-model="quantites"
          label="Nombre de produit"
          required
          :rules="rules"
        ></v-text-field>
      </v-col>
      <v-col cols="6" class="ma-0 pa-0">
        <div class="container">
          <v-btn :disabled="quantites==0" text small width="100%" @click="save">Ajouter</v-btn>
        </div>
      </v-col>
    </v-row>
    <v-row class="ma-0 pa-0">
      <v-col cols="6" class="ma-0 pa-0">
        <small>Limité à 10 exemplaire par commande</small>
      </v-col>
      <v-col cols="6">
        <small v-if="confiture.quantite>10"></small>
        <small v-else-if="confiture.quantite>0">Quantité max : {{ confiture.quantite }}</small>
        <small v-else class="red--text">Plus de stock</small>
      </v-col>
    </v-row>
  </v-container>
</template>

<script src="./addPanier.js"></script>