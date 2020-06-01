<template>
  <div class="text-center">
    <v-menu offset-y>
      <template v-slot:activator="{ on }">
        <v-badge v-if="quantites" color="blue" :content="quantites">
          <v-btn v-on="on">PANIER</v-btn>
        </v-badge>
      </template>
      <v-list>
        <v-list-item v-for="(item, index) in items" :key="index" @click>
          <v-list-item-title>{{ item.title }}</v-list-item-title>
        </v-list-item>
      </v-list>
    </v-menu>
  </div>
</template>

<script src="./Panier.js"></script>
