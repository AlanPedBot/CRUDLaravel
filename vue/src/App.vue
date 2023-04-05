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
      margin: 20px;
      min-height: 200px;
    }
    h1{
      text-align: center;
      font-size: 42px;
      margin-bottom: 1px;
      color:#222 ;
    }
    #create-form{
        max-width: 300px;
        margin: 0 auto;
        height: 670px; 
        margin-top: 30px; 
    }
    .input-container{
        display: flex;
        flex-direction: column;
        margin-bottom: 30px;
    }
    label{
        font-weight: bold;
        margin-bottom: 10px;
        color: #222;
        padding: 5px 10px;
        border-left: 4px solid #429bf4;
        font-size: 22px;
    }
    input, button{
        padding: 10px 15px;
        width: 450px;
        border-radius: 10px;
    }
    .btn-submit{
        backdrop-filter: #222;
        color: #429bf4;
        font-weight: bold;
        border: 2px solid #222;
        padding: 10px;
        font-size: 16px;
        margin: 0 auto;
        cursor: pointer;
        transition: .5s;
        background-color: #222;
    }
    .btn-submit:hover{
        background-color: transparent;
        color: #222;
    }
    .message-container{
    color: #004085;
    background-color: #CCE5FF;
    border: #B8DAFF;
    border-radius: 5px;
    padding: 10px;
    max-width: 400px;
    margin: 30px auto;
}
.messageError-container{
    color: red;
    background-color: #ffd2cc;
    border: #ffbab8;
    border-radius: 5px;
    padding: 10px;
    max-width: 400px;
    margin: 30px auto;
}
</style> 

