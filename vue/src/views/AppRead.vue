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