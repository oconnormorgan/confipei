<template>
  <v-row>
    <v-col cols="6">
      <v-text-field type="number" min="0" v-model="quantites" label="Nombre de produit" required></v-text-field>
    </v-col>
    <v-col cols="6">
      <div class="container">
        <v-btn :disabled="quantites==0" text small width="100%" @click="save">Ajouter</v-btn>
      </div>
    </v-col>
  </v-row>
</template>

<script src="./addPanier.js"></script>