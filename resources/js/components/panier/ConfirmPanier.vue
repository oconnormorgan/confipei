<template>
  <v-stepper v-model="e1">
    <v-stepper-header>
      <v-stepper-step :complete="e1 > 1" step="1">Confirmation de votre commande</v-stepper-step>

      <v-divider></v-divider>

      <v-stepper-step :complete="e1 > 2" step="2">Addresse de livraison et de facturation</v-stepper-step>

      <v-divider></v-divider>

      <v-stepper-step step="3">Paiement</v-stepper-step>
    </v-stepper-header>

    <v-stepper-items>
      <v-stepper-content step="1">
        <v-card class="mb-12" color="grey lighten-1" height="200px"></v-card>

        <v-btn color="primary" @click="e1 = 2">Continuer</v-btn>

        <v-btn text to="/panier">Annuler</v-btn>
      </v-stepper-content>

      <v-stepper-content step="2">
        <v-card class="mb-12" color="grey lighten-1" height="200px"></v-card>

        <v-btn color="primary" @click="e1 = 3">Continuer</v-btn>

        <v-btn text @click="e1 = 1">Annuler</v-btn>
      </v-stepper-content>

      <v-stepper-content step="3">
        <v-card class="mb-12" color="grey lighten-1" height="200px"></v-card>

        <v-btn color="primary" @click="alertCommande()">Continuer</v-btn>

        <v-btn text @click="e1 = 2">Annuler</v-btn>
      </v-stepper-content>
    </v-stepper-items>
  </v-stepper>
</template>

<script>
export default {
  data() {
    return {
      e1: 1
    };
  },
  methods : {
      alertCommande() {
          alert("Merci de votre achat !");
      }
  }
};
</script>