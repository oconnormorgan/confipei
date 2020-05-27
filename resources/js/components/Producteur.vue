<template>
  <div class="container">
    <div class="row justify-content-center">
      <div>
        <v-data-table :headers="headers" :items="datas" sort-by="data" class="elevation-1">
          <template v-slot:item.confiture="{ item }">{{ item.intitule }}</template>
        </v-data-table>
      </div>
    </div>
  </div>
</template>

<script src="./Producteur.js"></script>