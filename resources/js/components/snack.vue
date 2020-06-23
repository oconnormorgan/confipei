<template>
  <div class="text-center ma-2">
    <v-snackbar v-model="snackBar" :color="color" left shaped top>{{ text }}</v-snackbar>
  </div>
</template>

<script>
import EventBus from "../_helpers/eventBus"; //producteur/consomateur // patern design

export default {
  data() {
    return {
      text: "",
      timeout: 3000,
      snackBar: false,
      color: ""
    };
  },

  methods: {
    initSnack(color, text) {
      this.snackBar = true;
      this.text = text;
      this.color = color;
    }
  },

  created() {
    EventBus.$on("snackSuccess", text => {
      this.initSnack("success", text);
    });
    EventBus.$on("snackError", text => {
      this.initSnack("error", text);
    });
  }
};
</script>