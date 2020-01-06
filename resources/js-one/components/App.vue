<template>
  <div id="app">
    <!--img alt="Vue logo" src="./assets/logo.png"-->
    <nav>
      <router-link to="/">Home</router-link>
      <router-link to="/img-uploader">img-uploader</router-link>
    </nav>
    <nav-bar />
    <router-view />
  </div>
</template>

<script>
import NavBar from './NavBar';

export default {
  name: "App",
  components: { NavBar }
};
</script>

<style>
* {
  box-sizing: border-box;
}
body {
  margin: 0;
  padding: 0;
}
#app {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
}
#nav {
  padding: 30px;
}
#nav a {
  font-weight: bold;
  color: #2c3e50;
}
#nav a.router-link-exact-active {
  color: #42b983;
}
</style>