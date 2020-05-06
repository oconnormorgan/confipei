<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>confipei</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://unpkg.com/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
</head>

<body>
    <div id="app">
        <router-link to="/accueil" class="nav-link">Go to Accueil</router-link>
        <router-link to="/dashboard" class="nav-link">Go to Dashboard</router-link>
        <div class="container">
            <router-view></router-view>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>