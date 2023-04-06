<template>
    <div class="main-container">
         <h1>Buscar Livro</h1>
         <AppFormRead/>
    </div>
 </template>
<script>
import AppFormRead from '../components/AppFormRead.vue';

export default{
   name: "AppRead",
   components:{
      AppFormRead,
   }
}
</script>
<style>
h1{
   margin-bottom: 50px;
   margin-top: 30px;
}
</style>