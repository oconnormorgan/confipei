<template>
  <v-container fluid class="fill-height">
    <v-row align="center" justify="center">
      <v-btn icon small>
        <v-icon
          class="mr-2"
          @click="toggleDrawer()"
        >mdi-pencil</v-icon>
      </v-btn>
    </v-row>
    <v-navigation-drawer v-model="drawer" absolute temporary class="pa-5">
      
      <v-text-field v-model="producteur.nom" label="Nom producteur"></v-text-field>
      <v-text-field v-model="producteur.id_user.nom" label="Nom user"></v-text-field>
      <v-text-field v-model="producteur.id_user.email" label="E-mail user"></v-text-field>

      <v-btn @click="save">Valider</v-btn>
    </v-navigation-drawer>
  </v-container>
</template>

<script src="./addProducteur.js"></script>
