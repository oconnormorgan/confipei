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
              <addConfiture @create="confitures.push($event)" />
            </v-toolbar>
          </template>
          <template v-slot:item.intitule="{ item }">{{ item.intitule }}</template>
          <template v-slot:item.prix="{ item }">{{ item.prix }}</template>
          <template v-slot:item.producteur="{ item }">{{ item.producteur.nom }}</template>
          <template v-slot:item.fruits="{ item }">{{ displayFruits(item.fruits) }}</template>
          <template v-slot:item.actions="{ item }">
            <addConfiture :confiture="item" :update="true" />
          </template>
        </v-data-table>
      </div>
    </div>
  </div>
</template>

<script src="./Dashboard.js"></script>