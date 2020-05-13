<template>
  <div class="container">
    <div class="row justify-content-center">
      <div>
        <H1>Dashboard</H1>
        <v-data-table :headers="headers" :items="datas" sort-by="data" class="elevation-1">
          <template v-slot:top>
            <v-toolbar flat color="white">
              <v-toolbar-title>Liste des confitures</v-toolbar-title>
              <v-divider class="mx-4" inset vertical></v-divider>
              <v-spacer></v-spacer>
              <v-dialog v-model="dialog" max-width="500px">
                <template v-slot:activator="{ on }">
                  <v-btn color="primary" dark class="mb-2" v-on="on" @click="createItem(createItem = true)" @click.stop="modal=true">
                    <i class="fas fa-plus-circle fa-2x"></i>
                  </v-btn>
                </template>
                <addConfiture />
              </v-dialog>
            </v-toolbar>
          </template>

          <template v-slot:item.intitule="{ item }">{{ item.intitule }}</template>
          <template v-slot:item.prix="{ item }">{{ item.prix }}</template>
          <template v-slot:item.producteur="{ item }">{{ item.producteur.nom }}</template>
          <template v-slot:item.fruits="{ item }">{{ displayFruits(item.fruits) }}</template>
          <template v-slot:item.actions="{ item }">
            <v-dialog v-model="dialog" max-width="500px">
              <template v-slot:activator="{ on }">
                <v-icon small class="mr-2" @click="editItem(item, createItem = false)" v-on="on">mdi-pencil</v-icon>
              </template>
              <addConfiture />
            </v-dialog>
            <v-icon small @click="deleteItem(item)">mdi-delete</v-icon>
          </template>
        </v-data-table>
      </div>
    </div>
  </div>
</template>

<script src="./Dashboard.js"></script>