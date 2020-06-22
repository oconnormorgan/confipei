<template>
  <v-app>
    <link
      href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css"
      rel="stylesheet"
    />
    <v-container>
      <navbar></navbar>
    </v-container>
    <v-content>
      <v-container>
        <router-view></router-view>
      </v-container>
    </v-content>
    <Footer />
    <Snack />
  </v-app>
</template>

<script>
import Navbar from "../navigation/Navbar";
import Footer from "../navigation/Footer";
import Snack from "../components/snack";
export default {
  components: {
    Navbar,
    Footer,
    Snack
  }
};
</script>