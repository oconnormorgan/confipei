<template>
  <div class="text-center">
    <v-menu class="mx-auto" :close-on-content-click="false">
      <template v-slot:activator="{ on }">
        <v-badge color="blue" :content="quantites" :value="quantites">
          <v-btn v-on="on">PANIER</v-btn>
        </v-badge>
      </template>
      <v-card class="mx-auto">
        <v-list-item v-for="(item, index) in itemPanier" :key="index">
          <v-list-item-title>{{ item.intitule }}</v-list-item-title>
          <v-text-field type="number" min="0" v-model="item.quantites" @input="updateQuantity(item)"></v-text-field>
        </v-list-item>
        <v-list-item>
          <v-btn small width="100%" to="/panier">Voir votre panier</v-btn>
        </v-list-item>
      </v-card>
    </v-menu>
  </div>
</template>

<script src="./Panier.js"></script>
