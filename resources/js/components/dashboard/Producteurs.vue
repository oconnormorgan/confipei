<template>
  <v-container fluid>
      <v-row>
        <H1>Dashboard Producteur</H1>
      </v-row>
      <v-row fluid class="ma-0 pa-0">
        <v-data-table :headers="headers" :items="datas" sort-by="data" class="elevation-1">
          <template v-slot:top>
            <v-toolbar flat color="white">
              <v-toolbar-title>Liste des producteurs</v-toolbar-title>
              <v-divider class="mx-4" inset vertical></v-divider>
            </v-toolbar>
          </template>

          <template v-slot:item.nom="{ item }">{{ item.nom }}</template>
          <template v-slot:item.id_user="{ item }">{{ item.id_user.nom }}</template>
          <template v-slot:item.id_user="{ item }">{{ item.id_user.email }}</template>

          <template v-slot:item.actions="{ item }">
            <addProducteur :producteur="item" :update="true" v-on:addProducteur="producteurs.push($event)" />
          </template>

        </v-data-table>
      </v-row>
  </v-container>
</template>

<script src="./Producteurs.js"></script>
