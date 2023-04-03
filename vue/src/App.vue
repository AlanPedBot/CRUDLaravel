<template>
  <div>
    <AppNavbar :logo="logo_src" alt="app_name" />
    <router-view />
    <AppFooter/>
  </div>
</template>

<script>
import AppNavbar from './components/AppNavbar.vue';
import AppFooter from './components/AppFooter.vue';

export default {
  components: {
    AppNavbar,
    AppFooter,
  },
  data() {
    return {
      logo_src: "/img/logo1.png",
      app_name: "Library"
    }
  }
}
</script>

<style>
   *{
      font-family: Arial, sans-serif;
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }
    .main-container{
      margin: 50px;
      min-height: 250px;
    }
    h1{
      text-align: center;
      font-size: 42px;
      margin-bottom: 30px;
      color:#222 ;
    }
</style> 

