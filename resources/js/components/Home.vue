<template>
    <div class="container">
        <div class="row justify-content-center">
            <div>
                <H1>Toto est à l'accueil</H1>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  computed: {
    username() {
      // We will see what `params` is shortly
      return this.$route.params.username
    }
  },
  methods: {
    goBack() {
      window.history.length > 1 ? this.$router.go(-1) : this.$router.push('/')
    }
  }
}
</script>
